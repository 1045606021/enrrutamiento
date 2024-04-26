<?php
// Incluir archivo de configuración de la base de datos
include_once '../config/config.php';

// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener las coordenadas ingresadas por el usuario
    $lat_origen = $_POST['latitud'];
    $lon_origen = $_POST['longitud'];


    // Función para calcular la distancia entre dos puntos utilizando la fórmula de Haversine
    function calcularDistancia($lat1, $lon1, $lat2, $lon2)
    {
        $rad = M_PI / 180;
        $dlat = $lat2 - $lat1;
        $dlon = $lon2 - $lon1;
        $R = 6372795; // Radio de la Tierra en metros     ($R = 6372.795; Radio de la Tierra en km)
        $a = pow(sin($rad * $dlat / 2), 2) + cos($rad * $lat1) * cos($rad * $lat2) * pow(sin($rad * $dlon / 2), 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $d = $R * $c;
        return $d; 
    }

    function encontrarCoordenadaCercana($lat_origen, $lon_origen, $coordenadas)
    {
        $coordenada_cercana = null;
        $distancia_minima = PHP_FLOAT_MAX;
        
        foreach ($coordenadas as $coordenada) {
            $lat_destino = $coordenada['LATITUD'];
            $lon_destino = $coordenada['LONGITUD'];
            
            // Calcular la distancia entre la coordenada actual y la de destino
            $distancia = calcularDistancia($lat_origen, $lon_origen, $lat_destino, $lon_destino);
            
            // Si la distancia es menor que la distancia mínima encontrada hasta ahora, actualizar la coordenada más cercana
            if ($distancia < $distancia_minima) {
                $distancia_minima = $distancia;
                $coordenada_cercana = $coordenada;
            }
        }
        return $coordenada_cercana;
    }
    // echo "<h1>COORDENADAS</h1>";


    //Función para imprimir las coordenadas más cercanas y el tiempo de viaje
    function imprimirCoordenadasYTiempo($lat_origen, $lon_origen, $con)
    {
        $coordenadas_para_insertar = array();
        
        // Consulta para obtener todas las coordenadas desde la base de datos
        $sql = "SELECT ID, LATITUD, LONGITUD, DIRECCION, CODIGO, DIRECCION_ACTUAL, MUNICIPIO FROM almacena_coordenada";
        $resultado = $con->query($sql);
        
        if ($resultado->num_rows > 0) {
            $coordenadas = $resultado->fetch_all(MYSQLI_ASSOC);
            
            // Coordenada actual (inicialmente la de origen)
            $coordenada_actual = array('LATITUD' => $lat_origen, 'LONGITUD' => $lon_origen, 'DIRECCION' => '', 'CODIGO' => '', 'DIRECCION_ACTUAL' => '', 'MUNICIPIO' =>'');
            
            // Iterativamente encontrar y procesar las coordenadas más cercanas
            while (!empty($coordenadas)) {
                // Encontrar la coordenada más cercana
                $coordenada_cercana = encontrarCoordenadaCercana($coordenada_actual['LATITUD'], $coordenada_actual['LONGITUD'], $coordenadas);
                
                // Guardar las coordenadas y direcciones en el array para insertar en la base de datos
                $coordenadas_para_insertar[] = array(
                    'LATITUD' => $coordenada_actual['LATITUD'],
                    'LONGITUD' => $coordenada_actual['LONGITUD'],
                    'DIRECCION' => $coordenada_actual['DIRECCION'],
                    'CODIGO' => $coordenada_actual['CODIGO'],
                    'DIRECCION_ACTUAL' => $coordenada_actual['DIRECCION_ACTUAL'],
                    'MUNICIPIO' => $coordenada_actual['MUNICIPIO'],
                );
                
                // Actualizar la coordenada actual para la siguiente iteración
                $coordenada_actual = $coordenada_cercana;
                
                // Encontrar el índice de la coordenada más cercana en el arreglo de coordenadas
                $index = array_search($coordenada_cercana, $coordenadas);
                
                // Eliminar la coordenada más cercana del arreglo de coordenadas
                unset($coordenadas[$index]);
            }
        }
        return $coordenadas_para_insertar;
    }
    
    // Obtener las coordenadas ingresadas por el usuario
    $lat_origen = $_POST['latitud'];
    $lon_origen = $_POST['longitud'];
    
    // Llamar a la función para imprimir las coordenadas más cercanas y el tiempo de viaje
    $coordenadas_para_insertar = imprimirCoordenadasYTiempo($lat_origen, $lon_origen, $con);
    
    // Insertar las coordenadas y direcciones en la tabla enrrutamiento
    $sql_insert = "INSERT INTO enrrutamiento (LATITUD, LONGITUD, DIRECCIONES, CODIGO, DIRECCION_ACTUAL, MUNICIPIO) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = $con->prepare($sql_insert);
    
    foreach ($coordenadas_para_insertar as $coordenada) {
        // Verificar si existe la clave 'DIRECCION' en $coordenada_actual antes de usarla
        $direccion = isset($coordenada['DIRECCION']) ? $coordenada['DIRECCION'] : '';
        $municipio_value = isset($coordenada['MUNICIPIO']) ? $coordenada['MUNICIPIO'] : 'ValorPorDefecto';
    
        $stmt->bind_param("dddsis", 
            $coordenada['LATITUD'], 
            $coordenada['LONGITUD'], 
            $direccion, 
            $coordenada['CODIGO'], 
            $coordenada['DIRECCION_ACTUAL'], 
            $municipio_value
        );
        $stmt->execute();
    }
    
    // Crear un archivo CSV y escribir los registros
    function escribirCSV($coordenadas_para_insertar, $filename)
    {
        $fp = fopen($filename, 'w');
        if ($fp === false) {
            echo "No se pudo abrir el archivo CSV para escritura.";
            return;
        }
        // Escribir encabezados
        fputcsv($fp, array('LATITUD', 'LONGITUD', 'DIRECCION', 'CODIGO', 'DIRECCION_ACTUAL, MUNICIPIO'));
        
        // Escribir registros
        foreach ($coordenadas_para_insertar as $coordenada) {
            fputcsv($fp, $coordenada);
        }
        
        fclose($fp);
    }

    // Nombre del archivo CSV
    $filename = 'enrrutamiento.csv';
    
    // Escribir los datos en el archivo CSV
    escribirCSV($coordenadas_para_insertar, $filename);
    
    // Descargar el archivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($filename);
    
    // Eliminar el archivo CSV después de descargarlo
    unlink($filename);
}
// Cerrar la conexión a la base de datos
$con->close();
