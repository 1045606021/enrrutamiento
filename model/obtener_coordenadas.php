<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OBTENER_COORDENADAS</title>
</head>
<body>
</body>
</html>
<br><a href="   ../view/bienvenida.php"        target="_blank"><li>INICIO</li></a><br>
<br><a href="   ../view/LAT_LON.PHP"           target="_blank"><li>ENRRUTAR</li></a><br>

<?php
include_once '../config/config.php';

// Función para obtener coordenadas desde la API de Google Maps
function getCoordinatesFromAPI($addresses)
{
    // API Key de Google Maps
    $api_key = 'AIzaSyC5EggJPOUuFXS8r1p5ulWT-Kltsymq8Mc'; 
    $all_coordinates = [];

    foreach ($addresses as $address) {
        // URL de la API de Google Maps para geocodificación
        $geocode_url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=" . $api_key;

        // Realizar la solicitud a la API
        $geocode_data = json_decode(@file_get_contents($geocode_url), true);

        if ($geocode_data && $geocode_data['status'] === 'OK') {
            // Extraer las coordenadas desde la respuesta de la API
            $coordinates['lat'] = $geocode_data['results'][0]['geometry']['location']['lat'];
            $coordinates['lng'] = $geocode_data['results'][0]['geometry']['location']['lng'];

            $all_coordinates[$address] = $coordinates;
        } else {
            // Manejar errores en la geocodificación
            $error_message = isset($geocode_data['error_message']) ? $geocode_data['error_message'] : '';

            if (strpos($error_message, 'ZERO_RESULTS') !== false) {
                // Si la respuesta indica que no se encontraron resultados, mostrar un mensaje personalizado
                echo "<span style='color: red;'>No se encontraron coordenadas para la dirección: $address</span><br>";
            } else {
                // En caso de otro tipo de error, mostrar el mensaje original
                // echo "$error_message para la dirección: $address<br>";
            }
            $all_coordinates[$address] = false;
        }
    }
    return $all_coordinates;
}
// Función para obtener todas las direcciones desde la base de datos
function getAllAddressesFromDatabase()
{
    global $con; // Variable global para la conexión a la base de datos

    // Consulta SQL para obtener todas las direcciones y códigos desde la base de datos
    $sql = "SELECT DIRECCIONES, CODIGO, DIRECCION_ACTUAL, MUNICIPIO FROM direcciones_descodificadas ORDER BY ID ASC";
    $result = $con->query($sql);

    // Verificar si se obtuvieron resultados
    if ($result) {
        $addresses_and_codes = [];
        while ($row = $result->fetch_assoc()) {
            // Concatenar la dirección actual con el código usando un guión medio
            $direccion_y_codigo = $row["DIRECCION_ACTUAL"] . ' - ' . $row["CODIGO"] . ' - ' . $row['MUNICIPIO'];
            // Utilizar la dirección como clave y la concatenación de dirección y código como valor
            $addresses_and_codes[$row["DIRECCIONES"]] = $direccion_y_codigo;
        }
        return $addresses_and_codes;
    } else {
        echo "Error en la consulta SQL: " . $con->error;
        return false;
    }
}

// Función principal para realizar la consulta a la API y obtener las coordenadas
function consultarCoordenadasDesdeAPI()
{
    global $con; // Variable global para la conexión a la base de datos

    // Obtener todas las direcciones y códigos desde la base de datos
    $direcciones_y_codigos = getAllAddressesFromDatabase();

    if ($direcciones_y_codigos) {
        // Obtener las coordenadas desde la API
        $coordinates = getCoordinatesFromAPI(array_keys($direcciones_y_codigos));

        // Imprimir las coordenadas obtenidas
        foreach ($coordinates as $address => $coords) {
            $direccion_y_codigo = $direcciones_y_codigos[$address]; // Obtener la concatenación de dirección y código asociado a la dirección

            // Dividir la cadena en dirección y código usando el guión medio como delimitador
            list($direccion_actual, $codigo, $municipio) = explode(' - ', $direccion_y_codigo);

            // Obtener la dirección descodificada y asignarla a una variable separada
            $direccion_descodificada = $address;


            if (is_array($coords)) {
                // Si $coords es un array válido, procede con el acceso a sus elementos
                $latitud = $coords['lat'];
                $longitud = $coords['lng'];
                                                        $existencia_query = mysqli_query($con, "SELECT 
                                                        DIRECCION, 
                                                        CODIGO,
                                                        DIRECCION_ACTUAL, 
                                                        MUNICIPIO
                                                        FROM almacena_coordenada 
                                                        WHERE DIRECCION = '$direccion_descodificada' 
                                                        AND CODIGO = '$codigo' 
                                                        AND DIRECCION_ACTUAL = '$direccion_actual'
                                                        AND MUNICIPIO = '$municipio' ");
                if (!$existencia_query) {
                    echo "Error en la consulta SQL: " . mysqli_error($con);
                } else {
                    if (mysqli_num_rows($existencia_query) > 0) {
                        echo "Este código ya está registrado: $codigo <br> Esta dirección ya está registrada: $direccion_actual<br>Esta dirección ya está registrada: $direccion_descodificada<br><br>";
                        continue;
                    } else {
                                                        // insertar las coordenadas en la tabla
                                                        $sql = "INSERT INTO 
                                                        almacena_coordenada 
                                                        (LATITUD, LONGITUD, 
                                                        DIRECCION_ACTUAL, 
                                                        DIRECCION, 
                                                        CODIGO,
                                                        MUNICIPIO) 
                                                        VALUES 
                                                        ('$latitud', 
                                                        '$longitud', 
                                                        '$direccion_actual', 
                                                        '$direccion_descodificada', 
                                                        '$codigo',
                                                        '$municipio')";
                        $result = $con->query($sql);
                        if (!$result) {
                            echo "Error al insertar en la base de datos: " . $con->error . "<br>";
                        } else {
                            echo " Dirección actual $direccion_actual <br>"; echo " Latitud: {$coords['lat']} - Longitud: {$coords['lng']} <br>"; echo " direccion descodificada: $address<br><br>";
                        }
                    }
                }
            } else {
                                                        $existencia_query = mysqli_query($con, "SELECT 
                                                        DIRECCION, 
                                                        CODIGO, 
                                                        DIRECCION_ACTUAL 
                                                        FROM coordenadas_erroneas 
                                                        WHERE DIRECCION = '$direccion_descodificada' 
                                                        AND CODIGO = '$codigo' 
                                                        AND DIRECCION_ACTUAL = '$direccion_actual' ");
                if (!$existencia_query) {
                    echo "Error en la consulta SQL: " . mysqli_error($con);
                } else {
                    if (mysqli_num_rows($existencia_query) > 0) {
                        echo "Este código no encontrado ya está registrado: $codigo <br> Esta dirección no encontrada ya está registrada: $direccion_actual<br>Esta dirección no encontrada ya está registrada: $direccion_descodificada<br>";
                        continue;
                    } else {
                                                    // Si no se encuentran coordenadas, almacenar la dirección en la tabla de coordenadas_erroneas
                                                        $sql = "INSERT INTO 
                                                        coordenadas_erroneas 
                                                        (DIRECCION, 
                                                        DIRECCION_ACTUAL, 
                                                        CODIGO ) 
                                                        VALUES 
                                                        ('$address', 
                                                        '$direccion_actual', 
                                                        '$codigo')";
                        $result = $con->query($sql);
                        if (!$result) {
                            echo "Error al insertar en la base de datos: " . $con->error . "<br><br>";
                        }

                        // Si $coords es false, muestra un mensaje de error o maneja la situación según sea necesario
                        echo "No se pudieron obtener coordenadas para la dirección: $address <br> $direccion_actual <br> $codigo <BR> $municipio<br><br>";
                    }
                }
            }
        }
    }

}

// Llamada a la función principal
consultarCoordenadasDesdeAPI();

// Cerrar la conexión a la base de datos
$con->close();





?>