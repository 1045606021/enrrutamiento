<?php
include '../config/config.php';

if (isset($_GET['ID']) && isset($_GET['ESTADO'])) {
    $id = $_GET['ID'];
    $estado = $_GET['ESTADO'];

    // Realizar la actualización del estado en la base de datos
    $sql = "UPDATE inspectores SET ESTADO = $estado WHERE ID = $id";
    mysqli_query($con, $sql);

    // Redireccionar a la página principal o a donde desees
    header("Location: ../view/index_inspector.php");
    exit();
}
?>
