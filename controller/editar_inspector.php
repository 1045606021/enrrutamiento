<?php
if (!empty($_POST['editar_inspector'])) {

    if (

        !empty($_POST['NOMBRE'])and
        !empty($_POST['NUMERO_DE_OPERARIO'])and
        !empty($_POST['GRUPO'])and
        !empty($_POST['FECHA_NACIMIENTO'])and
        !empty($_POST['NUMERO_CELULAR'])and
        !empty($_POST['FECHA_VENCIMIENTO_CARNET_SALUD'])and
        !empty($_POST['FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR'])and
        !empty($_POST['CANTIDAD_HORAS_DIARIAS'])and
        !empty($_POST['USUARIO_ASOCIADO'])and
        !empty($_POST['IMEI'])and
        !empty($_POST['CARGO'])and
        !empty($_POST['ESTADO'])and
        !empty($_POST['VERSION_APP'])and
        !empty($_POST['FECHA_MODIFICACION'])
    ) {
        $ID = $_POST['ID'];

        $NOMBRE = $_POST['NOMBRE'];
        $NUMERO_DE_OPERARIO = $_POST['NUMERO_DE_OPERARIO'];
        $GRUPO = $_POST['GRUPO'];
        $FECHA_DE_NACIMIENTO = $_POST['FECHA_NACIMIENTO'];
        $NUMERO_CELULAR = $_POST['NUMERO_CELULAR'];
        $FECHA_VENCIMIENTO_CARNET_SALUD = $_POST['FECHA_VENCIMIENTO_CARNET_SALUD'];
        $FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR = $_POST['FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR'];
        $CANTIDAD_HORAS_DIARIAS = $_POST['CANTIDAD_HORAS_DIARIAS'];
        $USUARIO_ASOCIADO = $_POST['USUARIO_ASOCIADO'];
        $IMEI = $_POST['IMEI'];
        $CARGO = $_POST['CARGO'];
        $ESTADO = $_POST['ESTADO'];
        $VERSION_APP = $_POST['VERSION_APP'];
        $FECHA_MODIFICACION = $_POST['FECHA_MODIFICACION'];
        

        $sql = $con->query("update inspectores set 

NOMBRE = '                                 $NOMBRE',
NUMERO_DE_OPERARIO = '                     $NUMERO_DE_OPERARIO ',
GRUPO = '                                  $GRUPO',
FECHA_NACIMIENTO = '                       $FECHA_NACIMIENTO',
NUMERO_CELULAR = '                         $NUMERO_CELULAR',
FECHA_VENCIMIENTO_CARNET_SALUD = '         $FECHA_VENCIMIENTO_CARNET_SALUD',
FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR = '  $FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR',
CANTIDAD_HORAS_DIARIAS = '                 $CANTIDAD_HORAS_DIARIAS',
USUARIO_ASOCIADO = '                       $USUARIO_ASOCIADO',
IMEI = '                                   $IMEI',
CARGO = '                                  $CARGO',
ESTADO = '                                 $ESTADO',
VERSION_APP = '                            $VERSION_APP',
FECHA_MODIFICACION ='                      $FECHA_MODIFICACION' where ID=$ID");

        if ($sql == 1) {
            header("location:../view/index_inspector.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'> herror al modificar";
        }
    } else {
        echo "<div class='alert alert-warning'> campos vacios";
    }
}
