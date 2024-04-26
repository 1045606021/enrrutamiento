<?php
require('../config/config.php');

// Nombre de la tabla
$tabla = 'coordenada';
$direcciones = 'direcciones_descodificadas';

// Consulta para eliminar todos los registros y reiniciar el autoincremento del ID
$consulta = "TRUNCATE TABLE $tabla";
$direcciones_DELETE = "TRUNCATE TABLE $direcciones";


// Ejecutar la consulta
if (mysqli_query($con, $direcciones_DELETE)) {
    echo "Se eliminaron todos los registros y se reinició el autoincremento del ID en la tabla '$direcciones'.";
} else {
    echo "Error al intentar eliminar los registros: " . mysqli_error($con);
}

// Ejecutar la consulta
if (mysqli_query($con, $consulta)) {
    echo "Se eliminaron todos los registros y se reinició el autoincremento del ID en la tabla '$tabla'.";
} else {
    echo "Error al intentar eliminar los registros: " . mysqli_error($con);
}

header("location:../view/coordenadas.php");

exit;
// Cerrar la conexión
mysqli_close($con);
?>
