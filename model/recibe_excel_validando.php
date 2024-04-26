<?php
require('../config/config.php');

if (isset($_POST['dataRutas'])) {
    // $tipo       = $_FILES['dataCliente']['type'];
    // $tamanio    = $_FILES['dataCliente']['size'];
    $archivotmpClientes  = $_FILES['dataRutas']['tmp_name'];
    $lineasClientes      = file($archivotmpClientes);

    foreach ($lineasClientes as $i => $linea) {
        
// esto borra la primera fila del archivo, si se quita entonces se mostrara la primera fila del archivo con
    if ($i!= 0 ) {
            $datos = explode(";", $linea);

            $cantidad_registros            = count($lineasClientes);
            $cantidad_regist_agregados     =  ($cantidad_registros - 1); {

                $fecha_programacion        = !empty($datos[0]) ? ($datos[0]) : '';
                $requerimiento             = !empty($datos[1]) ? ($datos[1]) : '';
                $orden_trabajo             = !empty($datos[2]) ? ($datos[2]) : '';
                $direccion                 = !empty($datos[3]) ? ($datos[3]) : '';
                $codigo_instalacion        = !empty($datos[4]) ? ($datos[4]) : '';
                $municipio                 = !empty($datos[5]) ? ($datos[5]) : '';
                $usuario                   = !empty($datos[6]) ? ($datos[6]) : '';
                $telefono                  = !empty($datos[7]) ? ($datos[7]) : '';
                $categoria                 = !empty($datos[8]) ? ($datos[8]) : '';
                $observacion_requerimiento = !empty($datos[9]) ? ($datos[9]) : '';
                $estado_operativo          = !empty($datos[10]) ? ($datos[10]) : '';
                $tipo_agenda               = !empty($datos[11]) ? ($datos[11]) : '';
                $jornada                   = !empty($datos[12]) ? ($datos[12]) : '';
                $sub_zonas                 = !empty($datos[13]) ? ($datos[13]) : '';
                $zona                      = !empty($datos[14]) ? ($datos[14]) : '';
                $inspector                 = !empty($datos[15]) ? ($datos[15]) : '';

                if (!empty($codigo_instalacion)) {
                    $checkemail_duplicidad = ("SELECT codigo_instalacion FROM rutas WHERE codigo_instalacion='" . ($codigo_instalacion) . "' ");
                    $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
                    $cant_duplicidad = mysqli_num_rows($ca_dupli);
                }
                //No existe Registros Duplicados
                if ($cant_duplicidad == 0) {
                    $insertarData = "INSERT INTO rutas(
                
                fecha_programacion,
                requerimiento,
                orden_trabajo,
                direccion,
                codigo_instalacion,
                municipio,
                usuario,
                telefono,
                categoria,
                observacion_requerimiento,
                estado_operativo,
                tipo_agenda,
                jornada,
                sub_zonas,
                zona,
                inspector)
                VALUES(
                
                '$fecha_programacion',
                '$requerimiento',
                '$orden_trabajo',
                '$direccion',
                '$codigo_instalacion',
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

                    mysqli_query($con, $insertarData);
                } else {
                    $updateData =  ("UPDATE rutas SET 
                    
	fecha_programacion='"        . $fecha_programacion . "',
	requerimiento='"             . $requerimiento . "',
	orden_trabajo='"             . $orden_trabajo . "',
	direccion='"                 . $direccion . "',
    codigo_instalacion='"        . $codigo_instalacion ."',
	municipio='"                 . $municipio . "',
	usuario='"                   . $usuario . "',
	telefono='"                  . $telefono . "',
	categoria='"                 . $categoria . "',
	observacion_requerimiento='" . $observacion_requerimiento . "',
	estado_operativo='"          . $estado_operativo . "',
	tipo_agenda='"               . $tipo_agenda . "',
	jornada='"                   . $jornada . "',
	sub_zonas='"                 . $sub_zonas . "',
	zona='"                      . $zona . "',
	inspector='"                 . $inspector . "'
    WHERE codigo_instalacion='"  . $codigo_instalacion . "'");

    


    
                    $result_update = mysqli_query($con, $updateData);
                }  
            } 
        }
    }
    header("location:../view/rutas.php");
    exit;

} else {

    echo "Error al subir el archivo. Por favor, asegúrate de seleccionar un archivo válido.";
}
?>
