<?php

session_start();

if (isset($_SESSION['usuario'])) {
    header("location: view/bienvenida.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register</title>
    <link type="img/css" rel="shortcut icon" href="img/icono.png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>

    <nav><a class="navbar-brand" href="img/icono.png"><img src="img/icono.png" alt="Logo" height="60"></a></nav>
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion"><b>Iniciar Sesión</b></button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Regístrarse</button>
                </div>
            </div>

            <!--Formulario de Login y registro-->
            <div class="contenedor__login-register">
                <form action="model/login_usuario.php" method="POST" class="formulario__login">
                    <h2>Iniciar Sesión</h2>
                    <label for="correo"><b>correo</b></label>
                    <input type="text" placeholder="correo" name="correo">
                    <label for="contrasena"><b>contrasena</b></label>
                    <input type="password" placeholder="contrasena" name="contrasena">
                    <button type="submit" name="submit">Entrar</button>
                </form>

                <form action="model/registro.php" method="POST" class="formulario__register">
                    <h2>Regístrarse</h2>
                    <label for="nombre"><b>nombre</b></label>
                    <input type="text" placeholder="nombre" name="nombre">
                    <label for="correo"><b>correo</b></label>
                    <input type="text" placeholder="correo" name="correo">
                    <label for="usuario"><b>usuario</b></label>
                    <input type="text" placeholder="usuario" name="usuario">
                    <label for="contraseña"><b>contraseña</b></label>
                    <input type="password" placeholder="contrasena" name="contrasena">
                    <button type="submit" name="submit">Regístrarse</button>
                </form>
            </div>
        </div>
    </main>
    <script src="assets/js/script.js"></script>
</body>

</html>







