<?php
if (!empty($_POST['editar_ruta'])) {

    if (

        !empty($_POST['fecha_programacion']) and
        !empty($_POST['requerimiento']) and
        !empty($_POST['orden_trabajo']) and
        !empty($_POST['direccion']) and
        !empty($_POST['municipio']) and
        !empty($_POST['usuario']) and
        !empty($_POST['telefono']) and
        !empty($_POST['categoria']) and
        !empty($_POST['observacion_requerimiento']) and
        !empty($_POST['estado_operativo']) and
        !empty($_POST['tipo_agenda']) and
        !empty($_POST['jornada']) and
        !empty($_POST['sub_zonas']) and
        !empty($_POST['zona']) and
        !empty($_POST['inspector'])
    ) {

        $id = $_POST['id'];

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


        $sql = $con->query("update rutas set


fecha_programacion='$fecha_programacion',
requerimiento='$requerimiento',
orden_trabajo='$orden_trabajo',
direccion='$direccion',
municipio='$municipio',
usuario='$usuario',
telefono='$telefono',
categoria='$categoria',
observacion_requerimiento='$observacion_requerimiento',
estado_operativo='$estado_operativo',
tipo_agenda='$tipo_agenda',
jornada='$jornada',
sub_zonas='$sub_zonas',
zona='$zona',
inspector='$inspector' where id=$id");

            if ($sql == 1){
            header("location:../view/rutas.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'> herror al modificar";
        }
        } else {
            echo "<div class='alert alert-warning'> campos vacios";
        }
    }

