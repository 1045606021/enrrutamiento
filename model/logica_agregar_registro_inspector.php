<?php
// Conexión a la base de datos
require_once ('../config/config.php');


$NOMBRE                                = $_POST['NOMBRE'];
$NUMERO_DE_OPERARIO                    = $_POST['NUMERO_DE_OPERARIO'];
$DNI_CEDULA                            = $_POST['DNI_CEDULA'];
$GRUPO                                 = $_POST['GRUPO'];
$FECHA_NACIMIENTO                      = $_POST['FECHA_NACIMIENTO'];
$NUMERO_CELULAR                        = $_POST['NUMERO_CELULAR'];
$FECHA_VENCIMIENTO_CARNET_SALUD        = $_POST['FECHA_VENCIMIENTO_CARNET_SALUD'];
$FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR = $_POST['FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR'];
$CANTIDAD_HORAS_DIARIAS                = $_POST['CANTIDAD_HORAS_DIARIAS'];
$USUARIO_ASOCIADO                      = $_POST['USUARIO_ASOCIADO'];
$IMEI                                  = $_POST['IMEI'];
$CARGO                                 = $_POST['CARGO'];
$ESTADO                                = $_POST['ESTADO'];
$VERSION_APP                           = $_POST['VERSION_APP'];
$FECHA_MODIFICACION                    = $_POST['FECHA_MODIFICACION'];

// Insertar datos en la tabla
$sql = "INSERT INTO inspectores (NOMBRE,
NUMERO_DE_OPERARIO,
DNI_CEDULA,
GRUPO,
FECHA_NACIMIENTO,
NUMERO_CELULAR,
FECHA_VENCIMIENTO_CARNET_SALUD,
FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR,
CANTIDAD_HORAS_DIARIAS,
USUARIO_ASOCIADO,
IMEI,
CARGO,
ESTADO,
VERSION_APP,
FECHA_MODIFICACION) 
        VALUES ('$NOMBRE',
'$NUMERO_DE_OPERARIO',
'$DNI_CEDULA',
'$GRUPO',
'$FECHA_NACIMIENTO',
'$NUMERO_CELULAR',
'$FECHA_VENCIMIENTO_CARNET_SALUD',
'$FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR',
'$CANTIDAD_HORAS_DIARIAS',
'$USUARIO_ASOCIADO',
'$IMEI',
'$CARGO',
'$ESTADO',
'$VERSION_APP',
'$FECHA_MODIFICACION')";


$verificacionQuery = $con->query("SELECT DNI_CEDULA FROM inspectores WHERE DNI_CEDULA = '$DNI_CEDULA'");
if ($verificacionQuery->num_rows > 0) {
    echo "Error: El DNI ( $DNI_CEDULA ) ya está registrado.";
} else {

if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
    header("location:../view/index_inspector.php");
    
} else {
    echo "Error al registrar: " . $sql . "<br>" . $con->error;
}
}
$con->close();
?>
<a href="../view/index_inspector.php">VER REGISTROS</a>
