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

                <form action="../model/logica_agregar_registro.php" method="POST">
                    <div class="form-group">
                        <label for="codigo_instalacion">Código de Instalación:</label>
                        <input type="text" name="codigo_instalacion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_programacion">Fecha de Programación:</label>
                        <input type="date" name="fecha_programacion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="requerimiento">Requerimiento:</label>
                        <input type="text" name="requerimiento" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="orden_trabajo">Orden de Trabajo:</label>
                        <input type="text" name="orden_trabajo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="municipio">Municipio:</label>
                        <input type="text" name="municipio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" name="usuario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" name="telefono" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoría:</label>
                        <input type="text" name="categoria" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="observacion_requerimiento">Observación del Requerimiento:</label>
                        <textarea name="observacion_requerimiento" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="estado_operativo">Estado Operativo:</label>
                        <input type="text" name="estado_operativo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tipo_agenda">Tipo de Agenda:</label>
                        <input type="text" name="tipo_agenda" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jornada">Jornada:</label>
                        <input type="text" name="jornada" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sub_zonas">Sub Zonas:</label>
                        <input type="text" name="sub_zonas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="zona">Zona:</label>
                        <input type="text" name="zona" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="inspector">Inspector:</label>
                        <input type="text" name="inspector" class="form-control" required>
                    </div><br>

                    <div style="text-align: center;">
                        <button class="btn btn-block">
                            <input type="submit" value="Agregar" class="btn" style="color: #000000; background-color: #9E9E9E; height: 50px; width: 30%;" ">
                </button>
            </div> <br>


        </form>
            </div>
        </div>
    </div>
    
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>