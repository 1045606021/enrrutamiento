<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>agregar Registro</title>
</head>
<style>
    .form-group {
        max-width: 500px;
        margin: auto;
    }
</style>

<?php
include "../nav.php";
?>

<body class="">

    <div class="container mt-5">

        <h2 class="mb-4 text-center " style="color: #9E9E9E;">Agregar registro</h2>

        <div class="card mx-auto bordered" style="width: 40rem;">
            <div class="card-body">

        <form action="../model/logica_agregar_registro_inspector.php" method="POST">

            <div class="form-group">
                <label for="NOMBRE">NOMBRE:</label>
                <input type="text" name="NOMBRE" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="NUMERO_DE_OPERARIO">NUMERO DE OPERARIO:</label>
                <input type="text" name="NUMERO_DE_OPERARIO" class="form-control">
            </div>
            <div class="form-group">
                <label for="DNI_CEDULA">DNI/CÉDULA:</label>
                <input type="text" name="DNI_CEDULA" class="form-control">
            </div>
            <div class="form-group">
                <label for="GRUPO">GRUPO:</label>
                <input type="text" name="GRUPO" class="form-control">
            </div>
            <div class="form-group">
                <label for="FECHA_NACIMIENTO">FECHA DE NACIMIENTO:</label>
                <input type="date" name="FECHA_NACIMIENTO" class="form-control">
            </div>
            <div class="form-group">
                <label for="NUMERO_CELULAR">NUMERO DE CELULAR:</label>
                <input type="text" name="NUMERO_CELULAR" class="form-control">
            </div>
            <div class="form-group">
                <label for="FECHA_VENCIMIENTO_CARNET_SALUD">FECHA VENCIMIENTO CARNET DE SALUD:</label>
                <input type="date" name="FECHA_VENCIMIENTO_CARNET_SALUD" class="form-control">
            </div>
            <div class="form-group">
                <label for="FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR">FECHA VENCIMIENTO LIBRETA DE CONDUCIR:</label>
                <input type="date" name="FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR" class="form-control">
            </div>
            <div class="form-group">
                <label for="CANTIDAD_HORAS_DIARIAS">CANTIDAD DE HORAS DIARIAS:</label>
                <input type="text" name="CANTIDAD_HORAS_DIARIAS" class="form-control">
            </div>
            <div class="form-group">
                <label for="USUARIO_ASOCIADO">USUARIO ASOCIADO:</label>
                <input type="text" name="USUARIO_ASOCIADO" class="form-control">
            </div>
            <div class="form-group">
                <label for="IMEI">IMEI:</label>
                <input type="text" name="IMEI" class="form-control">
            </div>
            <div class="form-group">
                <label for="CARGO">CARGO:</label>
                <input type="text" name="CARGO" class="form-control">
            </div>
            <div class="form-group">
                <label for="ESTADO">ESTADO:</label>
                <input type="text" name="ESTADO" class="form-control">
            </div>
            <div class="form-group">
                <label for="VERSION_APP">VERSIÓN DE LA APP:</label>
                <input type="text" name="VERSION_APP" class="form-control">
            </div>
            <div class="form-group">
                <label for="FECHA_MODIFICACION">FECHA DE MODIFICACIÓN:</label>
                <input type="date" name="FECHA_MODIFICACION" class="form-control">
            </div><br>
            <div style="text-align: center;">
                <button class="btn btn-block">
                    <input type="submit" value="Agregar" class="btn" style="color: #000000; background-color: #9E9E9E; height: 50px; width: 30%;">
                </button>
            </div> <br>


        </form>
        </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>