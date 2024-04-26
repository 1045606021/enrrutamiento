<?php

session_start();

include '../config/config.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    $mensajeCorreo = '';
    $mensajeContrasena = '';

    if (empty($correo)) {
        $mensajeCorreo = "Falta agregar correo ...... " . "\\n";
    }
    if (empty($contrasena)) {
        $mensajeContrasena = "Falta agregar contraseña ....." . "\\n" ;
    }

    if (!empty($mensajeCorreo) || !empty($mensajeContrasena)) {
        echo "<script>
                alert(' $mensajeContrasena $mensajeCorreo');
                window.location = '../index.php';
            </script>";
            
    } else {

        // encriptacion de contraseña
        $contrasena = hash('sha512', $contrasena);

        $validar_login  = mysqli_query($con, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'");

        if (mysqli_num_rows($validar_login) > 0) {
            $_SESSION['usuario'] = $correo;
            header("Location: ../view/bienvenida.php");
            exit;
        } else {
            echo '<script>
                    alert("Usuario no existe, por favor verifique los datos introducidos");
                    window.location = "../index.php";
                </script>';
            exit();
        }
    
}
?>
