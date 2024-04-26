<?php
include_once('../config/config.php');

if (isset($_FILES['dataCoordenadas']) && $_FILES['dataCoordenadas']['error'] === UPLOAD_ERR_OK) {
    $archivotmpClientes  = $_FILES['dataCoordenadas']['tmp_name'];
    $lineasClientes      = file($archivotmpClientes);

    foreach ($lineasClientes as $i => $linea) {
        if ($i != 0) {
            $datos = explode(";", $linea);
            if (count($datos) >= 2) { // Verifica que la línea tenga al menos dos campos

                $DIRECCION_ACTUAL               = !empty($datos[0]) ? mysqli_real_escape_string($con, $datos[0]) : '';
                $ID_CODIGO_INSTALACION          = !empty($datos[1]) ? mysqli_real_escape_string($con, $datos[1]) : '';
                $MUNICIPIO                      = !empty($datos[2]) ? mysqli_real_escape_string($con, $datos[2]) : '';

                $insertarData = "INSERT INTO coordenada (DIRECCION_ACTUAL, ID_CODIGO_INSTALACION, MUNICIPIO)
                                VALUES ('$DIRECCION_ACTUAL', '$ID_CODIGO_INSTALACION', '$MUNICIPIO')
                                ON DUPLICATE KEY UPDATE DIRECCION_ACTUAL = VALUES(DIRECCION_ACTUAL), ID_CODIGO_INSTALACION = VALUES(ID_CODIGO_INSTALACION), MUNICIPIO = VALUES (MUNICIPIO)";

                mysqli_query($con, $insertarData);
            } else {
                ECHO "NO HAY RESULTADOS";
            }
        }
    }
    header("location:../view/coordenadas.php");
    exit;
} else {
    echo "Error al subir el archivo. Por favor, asegúrate de seleccionar un archivo válido.";
}
?>
