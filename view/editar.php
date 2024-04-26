<?php
include "../config/config.php";
include "../controller/editar_ruta.php";
$id = $_GET['id'];
$sql = $con->query("SELECT * FROM rutas WHERE id = $id");
$data = $sql->fetch_object();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar de Registro</title>
</head>
<style>
        .form-group {
            max-width: 500px;
            margin: auto;
        }
    </style>
<body>
    <nav>
        <?php 
include "../nav.php";
?>
</nav>

    <div class="container mt-5">
    <div class="card mx-auto bordered" style="width: 40rem;">
            <div class="card-body">

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= urlencode ($_GET['id']) ?> ">
            <h2 class="mb-4 text-center "  style="color: #9E9E9E;">editar rutas</h2>

            <div class="form-group">
                <label for="fecha_programacion">Fecha de Programación:</label>
                <input type="date" name="fecha_programacion" class="form-control" required value="<?= urlencode ($data->fecha_programacion); ?>">
            </div>

            <div class="form-group">
                <label for="requerimiento">Requerimiento:</label>
                <input type="text" name="requerimiento" class="form-control" required value="<?= $data->requerimiento; ?>">
            </div>

            <div class="form-group">
                <label for="orden_trabajo">Orden de Trabajo:</label>
                <input type="text" name="orden_trabajo" class="form-control" required value="<?= $data->orden_trabajo; ?>">
            </div>

            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" class="form-control" required value="<?= $data->direccion; ?>">
            </div>

            <div class="form-group">
                <label for="municipio">Municipio:</label>
                <input type="text" name="municipio" class="form-control" required value="<?= $data->municipio; ?>">
            </div>

            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" class="form-control" required value="<?= $data->usuario; ?>">
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" class="form-control" required value="<?= $data->telefono; ?>">
            </div>

            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <input type="text" name="categoria" class="form-control" required value="<?= $data->categoria; ?>">
            </div>

            <div class="form-group">
                <label for="observacion_requerimiento">Observación del Requerimiento:</label>
                <textarea name="observacion_requerimiento" class="form-control" required><?=$data->observacion_requerimiento; ?></textarea>
            </div>

            <div class="form-group">
                <label for="estado_operativo">Estado Operativo:</label>
                <input type="text" name="estado_operativo" class="form-control" required value="<?= $data->estado_operativo; ?>">
            </div>

            <div class="form-group">
                <label for="tipo_agenda">Tipo de Agenda:</label>
                <input type="text" name="tipo_agenda" class="form-control" required value="<?= $data->tipo_agenda; ?>">
            </div>

            <div class="form-group">
                <label for="jornada">Jornada:</label>
                <input type="text" name="jornada" class="form-control" required value="<?= $data->jornada; ?>">
            </div>

            <div class="form-group">
                <label for="sub_zonas">Sub Zonas:</label>
                <input type="text" name="sub_zonas" class="form-control" required value="<?= $data->sub_zonas; ?>">
            </div>

            <div class="form-group">
                <label for="zona">Zona:</label>
                <input type="text" name="zona" class="form-control" required value="<?= $data->zona; ?>">
            </div>

            <div class="form-group">
                <label for="inspector">Inspector:</label>
                <input type="text" name="inspector" class="form-control" required value="<?= $data->inspector; ?>">
            </div><br>

            <div style="text-align: center;">
                    <button class="btn btn-block" >
                        <input type="submit" name="editar_ruta" class="btn" style="color: #000000; background-color: #9E9E9E; height: 50px; width: 30%;" value="Guardar edición">
                    </button>
            </div><br>
        </form>
            </div>
    </div>
    </div>

</body>

</html>
