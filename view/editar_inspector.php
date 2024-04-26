<?php
include "../config/config.php";
include "../controller/editar_inspector.php";
$ID = $_GET['ID'];
$sql = $con->query("SELECT * FROM inspectores WHERE ID = $ID");
$data = $sql->fetch_object();
?>

<style>
    .form-group {
        max-width: 500px;
        margin: auto;
    }
</style>

<body>
<?php
include "../nav.php";
?>
    <div class="container mt-5">
        <div class="card mx-auto bordered" style="width: 40rem;">
            <div class="card-body">

                <form action="" method="POST">

                    <input type="hidden" name="ID" value="<?= $_GET['ID'] ?>">

                    <h2 class="mb-4 text-center " style="color: #9E9E9E;">EDITAR INSPECTORES</h2>

                    <div class="form-group">
                        <label for="NOMBRE">Nombre:</label>
                        <input type="text" name="NOMBRE" class="form-control" required value="<?= $data->NOMBRE; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NUMERO_DE_OPERARIO">Número de Operario:</label>
                        <input type="text" name="NUMERO_DE_OPERARIO" class="form-control" required value="<?= $data->NUMERO_DE_OPERARIO; ?>">
                    </div>
                    <!-- <div class="form-group">
                <label for="DNI_CEDULA">DNI o Cédula:</label>
                <input type="text" name="DNI_CEDULA" class="form-control" required value="<?= $data->DNI_CEDULA; ?>">
            </div> -->
                    <div class="form-group">
                        <label for="GRUPO">Grupo:</label>
                        <input type="text" name="GRUPO" class="form-control" required value="<?= $data->GRUPO; ?>">
                    </div>
                    <div class="form-group">
                        <label for="FECHA_DE_NACIMIENTO">Fecha de Nacimiento:</label>
                        <input type="date" name="FECHA_NACIMIENTO" class="form-control" required value="<?= $data->FECHA_NACIMIENTO; ?>">
                    </div>
                    <div class="form-group">
                        <label for="NUMERO_CELULAR">Número de Celular:</label>
                        <input type="text" name="NUMERO_CELULAR" class="form-control" required value="<?= $data->NUMERO_CELULAR; ?>">
                    </div>
                    <div class="form-group">
                        <label for="FECHA_VENCIMIENTO_CARNET_SALUD">Fecha de Vencimiento Carnet de Salud:</label>
                        <input type="date" name="FECHA_VENCIMIENTO_CARNET_SALUD" class="form-control" required value="<?= $data->FECHA_VENCIMIENTO_CARNET_SALUD; ?>">
                    </div>
                    <div class="form-group">
                        <label for="FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR">Fecha de Vencimiento Libreta de Conducir:</label>
                        <input type="date" name="FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR" class="form-control" required value="<?= $data->FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR; ?>">
                    </div>
                    <div class="form-group">
                        <label for="CANTIDAD_HORAS_DIARIAS">Cantidad de Horas Diarias:</label>
                        <input type="text" name="CANTIDAD_HORAS_DIARIAS" class="form-control" required value="<?= $data->CANTIDAD_HORAS_DIARIAS; ?>">
                    </div>
                    <div class="form-group">
                        <label for="USUARIO_ASOCIADO">Usuario Asociado:</label>
                        <input type="text" name="USUARIO_ASOCIADO" class="form-control" required value="<?= $data->USUARIO_ASOCIADO; ?>">
                    </div>
                    <div class="form-group">
                        <label for="IMEI">IMEI:</label>
                        <input type="text" name="IMEI" class="form-control" required value="<?= $data->IMEI; ?>">
                    </div>
                    <div class="form-group">
                        <label for="CARGO">Cargo:</label>
                        <input type="text" name="CARGO" class="form-control" required value="<?= $data->CARGO; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ESTADO">Estado:</label>
                        <select name="ESTADO" class="form-control" required value="<?= $data->ESTADO; ?>">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="VERSION_APP">Versión de la App:</label>
                        <input type="text" name="VERSION_APP" class="form-control" required value="<?= $data->VERSION_APP; ?>">
                    </div>
                    <div class="form-group">
                        <label for="FECHA_MODIFICACION">Fecha de Modificación:</label>
                        <input type="date" name="FECHA_MODIFICACION" class="form-control" required value="<?= $data->FECHA_MODIFICACION; ?>">
                    </div><br>

                    <div style="text-align: center">
                        <button class="btn btn-block">
                            <input type="submit" name="editar_inspector" class="btn" style="color: #000000; background-color: #9E9E9E; height: 50px; width: 30%;" value="Guardar edición">
                        </button>
                    </div><br>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>