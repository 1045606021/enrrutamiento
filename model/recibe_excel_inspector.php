<?php
require('../config/config.php');

if (isset($_POST['dataRutas'])) {
    
    $archivotmpClientes            = $_FILES['dataRutas']['tmp_name'];
    $lineasClientes                = file($archivotmpClientes);
    foreach ($lineasClientes as $i => $linea) {

// esto borra la primera fila del archivo, si se quita entonces se mostrara la primera fila del archivo con
      
if ($i !=0) {
            $datos = explode(";", $linea);

            $cantidad_registros                = count($lineasClientes);
            $cantidad_regist_agregados         =  $cantidad_registros -1; {


                $NOMBRE                                 = !empty($datos[0]) ? $datos[0] : '';
                $NUMERO_DE_OPERARIO                     = !empty($datos[1]) ? $datos[1] : '';
                $DNI_CEDULA                             = !empty($datos[2]) ? $datos[2] : '';
                $GRUPO                                  = !empty($datos[3]) ? $datos[3] : '';
                $FECHA_NACIMIENTO                       = !empty($datos[4]) ? $datos[4] : '';
                $NUMERO_CELULAR                         = !empty($datos[5]) ? $datos[5] : '';
                $FECHA_VENCIMIENTO_CARNET_SALUD         = !empty($datos[6]) ? $datos[6] : '';
                $FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR  = !empty($datos[7]) ? $datos[7] : '';
                $CANTIDAD_HORAS_DIARIAS                 = !empty($datos[8]) ? $datos[8] : '';
                $USUARIO_ASOCIADO                       = !empty($datos[9]) ? $datos[9] : '';
                $IMEI                                   = !empty($datos[10]) ? $datos[10] : '';
                $CARGO                                  = !empty($datos[11]) ? $datos[11] : '';
                $ESTADO                                 = !empty($datos[12]) ? $datos[12] : '';
                $VERSION_APP                            = !empty($datos[13]) ? $datos[13] : '';
                $FECHA_MODIFICACION                     = !empty($datos[14]) ? $datos[14] : '';

                if (!empty($DNI_CEDULA)) {
                    $checkemail_duplicidad = ("SELECT DNI_CEDULA FROM inspectores WHERE DNI_CEDULA='" . ($DNI_CEDULA) . "' ");
                    $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
                    $cant_duplicidad = mysqli_num_rows($ca_dupli);
                }
                // No existe registros duplicados
                if ($cant_duplicidad == 0) {
                    $insertarData = "INSERT INTO inspectores (

        NOMBRE,
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
        VALUES (

        '$NOMBRE',
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

                    mysqli_query($con, $insertarData);
                } else {
                    $updateData = ("UPDATE inspectores SET 

        NOMBRE = '"                                 . $NOMBRE . "',
        NUMERO_DE_OPERARIO = '"                     . $NUMERO_DE_OPERARIO . "',
        DNI_CEDULA = '"                             . $DNI_CEDULA . "',
        GRUPO = '"                                  . $GRUPO . "',
        FECHA_NACIMIENTO = '"                       . $FECHA_NACIMIENTO . "',
        NUMERO_CELULAR = '"                         . $NUMERO_CELULAR . "',
        FECHA_VENCIMIENTO_CARNET_SALUD = '"         . $FECHA_VENCIMIENTO_CARNET_SALUD . "',
        FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR = '"  . $FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR . "',
        CANTIDAD_HORAS_DIARIAS = '"                 . $CANTIDAD_HORAS_DIARIAS . "',
        USUARIO_ASOCIADO = '"                       . $USUARIO_ASOCIADO . "',
        IMEI = '"                                   . $IMEI . "',
        CARGO = '"                                  . $CARGO . "',
        ESTADO = '"                                 . $ESTADO . "',
        VERSION_APP = '"                            . $VERSION_APP . "',
        FECHA_MODIFICACION = '"                     . $FECHA_MODIFICACION . "'
        WHERE DNI_CEDULA = '"                       . $DNI_CEDULA . "'");

                    $result_update = mysqli_query($con, $updateData);
                }
            }
        }
    }
    header("location:../view/index_inspector.php");
    exit;
} else {
    echo "Error al subir el archivo. Por favor, asegúrate de seleccionar un archivo válido.";
}
?>
