<?php 
include '../config/config.php';

$nombre      = $_POST['nombre'];
$correo      = $_POST['correo'];
$usuario     = $_POST['usuario'];
$contrasena  = $_POST['contrasena'];

// /////////////////////////////////////////////////
$mensajeCorreo = '';
$mensajeUsuario = '';

if (empty($correo)) {
    $mensajeCorreo = "Falta agregar correo: \\n ";
}
if (empty($usuario)) {
    $mensajeUsuario = "Falta agregar usuario: \\n";
}

if (!empty($mensajeCorreo) || !empty($mensajeUsuario)) {
    echo "<script>
            alert(' $mensajeUsuario $mensajeCorreo');
            window.location = '../index.php';
        </script>";
}else{
// /////////////////////////////////////////////////

// encriptamiento de contraseña
$contrasena = hash ('sha512',$contrasena);

$query = "INSERT INTO usuarios(nombre, correo, usuario, contrasena)
values('$nombre', '$correo', '$usuario', '$contrasena')";

// verificar que el correo no se repita 
$verificar_correo = mysqli_query($con, "SELECT * FROM usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0){
    echo '<script> 
            alert ("Este correo ya esta registrado, intenta con uno diferente");
            window.location = "../index.php";
        </script>';exit();
}
// verificar que el usuario no se repita 
$verificar_usuario = mysqli_query($con, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0){
    echo '<script> 
            alert ("Este usuario ya esta registrado, intenta con uno diferente");
            window.location = "../index.php";
        </script>';exit();
}

$ejecutar = mysqli_query($con, $query);
if($ejecutar){
    echo '<script>
            alert("usuario registrado exitosamente");
            window.location = "../index.php";
        </script>';
}else{
    echo '<script>
        alert("intentalo de nuevo");
        window.location = "../index.php";
    </script>';
}
}
mysqli_close($con);

?>







