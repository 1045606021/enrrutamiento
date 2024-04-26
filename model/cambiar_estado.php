<?php
include '../config/config.php';

if (isset($_GET['id']) && isset($_GET['estado'])) {
    $id = $_GET['id'];
    $estado = $_GET['estado'];

    $sql = "UPDATE rutas SET estado = $estado WHERE id = $id";
    mysqli_query($con, $sql);

    header("Location: ../view/rutas.php");
    exit();
}




// include '../config/config.php';

// $con = mysqli_connect("localhost", "root", "", "eyc_proyecto");

// if (!$con) {
//     die("Error de conexión: " . mysqli_connect_error());
// }

// if (isset($_GET['id']) && isset($_GET['estado'])) {
//     $id = $_GET['id'];
//     $estado = $_GET['estado'];
//     $id = $_GET['id'];

//     // Mover el registro a la tabla correspondiente

//     if ($estado == 1) {
//         $sqlMover = "INSERT INTO rutas_inactivas SELECT * FROM rutas WHERE id = $id";
//     } else {
//         $sqlMover = "INSERT INTO rutas SELECT * FROM rutas_inactivas WHERE id = $id";
//     }

    // Realizar la actualización en la base de datos

    // mysqli_query($con, $sqlMover);

    // Eliminar el registro de la tabla original

    // $sqlEliminar = "DELETE FROM rutas WHERE id = $id";
    // mysqli_query($con, $sqlEliminar);

    // echo "ID a cambiar de estado: $id";
    // echo $sqlMover;
    // echo $sqlEliminar;

    // if (!mysqli_query($con, $sqlMover)) {
    //     die("Error al mover el registro: " . mysqli_error($con));
    // }
    
    // if (!mysqli_query($con, $sqlEliminar)) {
    //     die("Error al eliminar el registro: " . mysqli_error($con));
    // }

    // Redireccionar a la página principal o a donde desees

//     header("Location: ../view/rutas.php");
// }
?>