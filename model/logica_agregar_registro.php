<?php
// Conexión a la base de datos
require_once ('../config/config.php');

// Procesar datos del formulario
$codigo_instalacion = $_POST['codigo_instalacion'];
$fecha_programacion = $_POST['fecha_programacion'];
$requerimiento = $_POST['requerimiento'];
$orden_trabajo = $_POST['orden_trabajo'];
$direccion = $_POST['direccion'];
$municipio = $_POST['municipio'];
$usuario = $_POST['usuario'];
$telefono = $_POST['telefono'];
$categoria = $_POST['categoria'];
$observacion_requerimiento = $_POST['observacion_requerimiento'];
$estado_operativo = $_POST['estado_operativo'];
$tipo_agenda = $_POST['tipo_agenda'];
$jornada = $_POST['jornada'];
$sub_zonas = $_POST['sub_zonas'];
$zona = $_POST['zona'];
$inspector = $_POST['inspector'];

// Insertar datos en la tabla
$sql = "INSERT INTO rutas (codigo_instalacion, 
fecha_programacion, 
requerimiento, 
orden_trabajo, 
direccion, municipio, usuario, 
telefono, categoria, 
observacion_requerimiento, 
estado_operativo, 
tipo_agenda, 
jornada, 
sub_zonas, 
zona, 
inspector) 
        VALUES ('$codigo_instalacion', 
        '$fecha_programacion', 
        '$requerimiento', 
        '$orden_trabajo', 
        '$direccion', 
        '$municipio', 
        '$usuario', 
        '$telefono', 
        '$categoria', 
        '$observacion_requerimiento', 
        '$estado_operativo', 
        '$tipo_agenda', 
        '$jornada', 
        '$sub_zonas', 
        '$zona', 
        '$inspector')";

$verificacionQuery = $con->query("SELECT * FROM rutas WHERE codigo_instalacion = '$codigo_instalacion'");
if ($verificacionQuery->num_rows > 0) {
    echo "Error: El codigo de instalacion: ( $codigo_instalacion ) ya está registrado.";
} else {

if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
    header("location:../index.php");
} else {
    echo "Error al registrar: " . $sql . "<br>" . $con->error;
}}

$con->close();
?>
<a href="../index.php">VER REGISTROS</a>