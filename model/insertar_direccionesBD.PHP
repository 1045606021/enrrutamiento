<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERTAR BD</title>
</head>
<body>
    
</body>
</html>
<br><a href="obtener_coordenadas.PHP" target="_blank"><li>Obtener coordenadas</li></a><br>
<br><a href="../view/bienvenida.php"><li>INICIO</li></a><br>

<?php
include_once "../config/config.php";
include_once "codificacion.php";

$instanciaImprimir = new imprimir_registros();
$resultados = $instanciaImprimir->imprimir();

// Verificar si hay registros en la base de datos

    foreach ($resultados as $resultado) {
        $codigo    = $resultado['codigo'];
        $direccion = $resultado['direccion'];
        $direccion_actual = $resultado['direccion_actual'];
        $municipio = $resultado['municipio'];

        // Verificar si ya existe la combinación de código y dirección en la base de datos
        $existencia_query = mysqli_query($con, "SELECT DIRECCIONES, CODIGO FROM direcciones_descodificadas WHERE CODIGO = '$codigo' AND DIRECCIONES = '$direccion'");

        if (mysqli_num_rows($existencia_query) > 0) {
            echo "Este código ya está registrado: $codigo <br> Esta dirección ya está registrada: $direccion<br> Esta dirección actual ya está registrada: $direccion_actual<BR>Este municipio ya esta insertado: $municipio<br><br>";
            continue;  
        }

        // Si no hay duplicados, insertar en la base de datos
        $insercion = $con->prepare("INSERT INTO direcciones_descodificadas (CODIGO, DIRECCIONES, DIRECCION_ACTUAL, MUNICIPIO) VALUES (?, ?, ?, ?)");
        $insercion->bind_param("ssss", $codigo, $direccion, $direccion_actual, $municipio);
        $insercion->execute();

        if (!$insercion) {
            die("Error al insertar en la bd: " . $con->error);
        } else {
            echo "Código ($codigo) fue insertado correctamente.<br>";
            echo "Dirección ($direccion) fue insertada correctamente.<br>";
            echo "Dirección actual ($direccion_actual) fue insertada correctamente.<br>";
            echo "Municipio ($municipio) fue insertada correctamente.<br><br>";
        }
    }



?>
