<?php
include "../config/config.php";

$where = "";

if (isset($_GET['enviar'])) {
    $busqueda = $_GET['busqueda'];

    if (isset($_GET['busqueda'])) {
        $where = "WHERE coordenada.
            DIRECCION LIKE '%"               . $busqueda . "%' or 
            ID_CODIGO_INSTALACION LIKE '%"   . $busqueda . "%' ";
    }
}
$sqlClientes = "SELECT * FROM coordenada "  . $where . " ORDER BY ID ASC";
$queryData = mysqli_query($con, $sqlClientes);

// Verificar si la consulta fue exitosa
if (!$queryData) {
    die("Error en la consulta SQL: " . mysqli_error($con));
}
$total_client = mysqli_num_rows($queryData);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="img/css" rel="shortcut icon" href="../img/icono.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/cssGenerales.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>index</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light text-light">
        <a class="navbar-brand" href="img/icono.png"><img src="../img/icono.png" alt="Logo" height="65"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <a class="nav-link font-weight-bold text-shadow h6" href="../index.php">INICIO <span class="underline"></span></a>
            <!-- <a class="nav-link font-weight-bold text-shadow h6" href="../model/direcciones.php" target="_blank">OBTENER COORDENADAS <span class="underline"></span></a> -->
            <a class="nav-link font-weight-bold text-shadow h6 mr-5" href="rutas.php">VER RUAS <span class="underline"></span></a>
            <a class="nav-link font-weight-bold text-shadow h6 mr-5" href="agregar_registro_insector.php">AGREGAR INSPECTOR <span class="underline"></span></a>
            <a class="nav-link font-weight-bold text-shadow h6 mr-5" href="../model/delete.php" class="btn btn-danger descargar">Eliminar Registros <span class="underline"></span></a>


            <form class="form-inline mr-5">
                <div class="input-group ">
                    <input class="form-control" type="search" name="busqueda" placeholder="Buscar" aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-light" name="enviar" type="submit">Buscar</button>
                    </div>
                </div>
            </form>

            <form action="../model/recibe_excel_coordenadas.php" method="POST" enctype="multipart/form-data" class="form-inline">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="dataCoordenadas" class="custom-file-input">
                        <label class="custom-file-label btn elegir-excel  ">Elegir Archivo</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-light subir-excel" name="dataCoordenadas" type="submit">Subir</button>
                    </div>
                </div>
            </form>

        </div>
    </nav><br><br>

    <div class="container">
        <div class="table-container">
            <div class="total-routes mt-3">
                <h1 class="lead font-weight-bold">
                    TOTAL DE COORDENADAS: (<span class="total-count"><?php echo $total_client; ?></span>)</h1>
            </div>

            <table class="table table-sm table-bordered table-striped expandida">
                <thead>
                    <tr class="alto">
                        <th>ID</th>
                        <th>DIRECCION</th>
                        <th>ID_CODIGO_INSTALACION</th>
                        <th>MUNICIPIO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($queryData)) { ?>
                    <tr>
                            <th scope="row"><?php echo $i; ?></th>

                            <th><?php echo $data['DIRECCION_ACTUAL']; ?></th>
                            <th><?php echo $data['ID_CODIGO_INSTALACION']; ?></th>
                            <th><?php echo $data['MUNICIPIO']; ?></th>
                        </tr>
                        <?php $i++;
                        } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>