<?php
include '../model/cambiar_estado.php';
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
            <a class="nav-link font-weight-bold text-shadow h6 mr-5" href="rutas.php">VER RUAS <span class="underline"></span></a>
            <a class="nav-link font-weight-bold text-shadow h6 mr-5" href="agregar_registro_insector.php">AGREGAR INSPECTOR <span class="underline"></span></a>
            <a class="nav-link font-weight-bold text-shadow h6" href="coordenadas.php" target="_blank">COORDENADAS<span class="underline"></span></a>
            <form class="form-inline mr-5">
                <div class="input-group ">
                    <input class="form-control" type="search" name="busqueda" placeholder="Buscar" aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-light" name="enviar" type="submit">Buscar</button>
                    </div>
                </div>
            </form>

            <form action="../model/recibe_excel_inspector.php" method="POST" enctype="multipart/form-data" class="form-inline">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="dataRutas" class="custom-file-input">
                        <label class="custom-file-label btn elegir-excel  ">Elegir Archivo</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-light subir-excel" name="dataRutas" type="submit">Subir</button>
                    </div>
                </div>
            </form>
        </div>
    </nav><br><br>

    <?php
    $con   = mysqli_connect("localhost", "root", "", "proyecto_empresa");
    $where = "";
    if (isset($_GET['enviar'])) {
        $busqueda = $_GET['busqueda'];
        if (isset($_GET['busqueda'])) {
            $where = "WHERE inspectores.

        NOMBRE                                 LIKE '%" . $busqueda . "%' or 
        NUMERO_DE_OPERARIO                     LIKE '%" . $busqueda . "%' or 
        DNI_CEDULA                             LIKE '%" . $busqueda . "%' or 
        GRUPO                                  LIKE '%" . $busqueda . "%' or 
        FECHA_NACIMIENTO                       LIKE '%" . $busqueda . "%' or 
        NUMERO_CELULAR                         LIKE '%" . $busqueda . "%' or 
        FECHA_VENCIMIENTO_CARNET_SALUD         LIKE '%" . $busqueda . "%' or 
        FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR  LIKE '%" . $busqueda . "%' or 
        CANTIDAD_HORAS_DIARIAS                 LIKE '%" . $busqueda . "%' or 
        USUARIO_ASOCIADO                       LIKE '%" . $busqueda . "%' or 
        IMEI                                   LIKE '%" . $busqueda . "%' or 
        CARGO                                  LIKE '%" . $busqueda . "%' or 
        ESTADO                                 LIKE '%" . $busqueda . "%' or 
        VERSION_APP                            LIKE '%" . $busqueda . "%' or 
        FECHA_MODIFICACION                     LIKE '%" . $busqueda . "%' ";
        }
    } ?>

    <?php
    include '../config/config.php';
    $sqlClientes = ("SELECT * FROM inspectores " . $where . " ORDER BY id ASC");
    $queryData = mysqli_query($con, $sqlClientes);
    $total_client = mysqli_num_rows($queryData); ?>

    <div class="container">
        <div class="table-container">
            <div class="total-routes mt-3">
                <h1 class="lead font-weight-bold">
                    TOTAL DE INSPECTORES: (<span class="total-count"><?php echo $total_client; ?></span>)</h1>
            </div>

            <table class="table table-sm table-bordered table-striped expandida">
                <thead>
                    <tr class="alto">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>NUMERO DE OPERARIO</th>
                        <th>DNI CEDULA</th>
                        <th>GRUPO</th>
                        <th>FECHA NACIMIENTO</th>
                        <th>NUMERO CELULAR</th>
                        <th>FECHA VENCIMIENTO CARNET ASLUD</th>
                        <th>FECHA VENCIMIENTO LIBRETA DE CONDUCIR</th>
                        <th>CANTIDAD HORAS DIARIAS</th>
                        <th>USUARIO ASOCIADO</th>
                        <th>IMEI</th>
                        <th>CARGO</th>
                        <th>ESTADO</th>
                        <th>VERSION APP</th>
                        <th>FECHA MODIFICACION</th>
                        <th>EDITAR</th>
                        <th>ESTADO</th>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($queryData)) { ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <th> <?php echo $data['NOMBRE']; ?></th>
                            <th> <?php echo $data['NUMERO_DE_OPERARIO']; ?></th>
                            <th> <?php echo $data['DNI_CEDULA']; ?></th>
                            <th> <?php echo $data['GRUPO']; ?></th>
                            <th> <?php echo $data['FECHA_NACIMIENTO']; ?></th>
                            <th> <?php echo $data['NUMERO_CELULAR']; ?></th>
                            <th> <?php echo $data['FECHA_VENCIMIENTO_CARNET_SALUD']; ?></th>
                            <th> <?php echo $data['FECHA_VENCIMIENTO_LIBRETA_DE_CONDUCIR']; ?></th>
                            <th> <?php echo $data['CANTIDAD_HORAS_DIARIAS']; ?></th>
                            <th> <?php echo $data['USUARIO_ASOCIADO']; ?></th>
                            <th> <?php echo $data['IMEI']; ?></th>
                            <th> <?php echo $data['CARGO']; ?></th>
                            <th> <?php echo $data['ESTADO']; ?></th>
                            <th> <?php echo $data['VERSION_APP']; ?></th>
                            <th> <?php echo $data['FECHA_MODIFICACION']; ?></th>

                            <td>
                                <a href="editar_inspector.php?ID=<?php echo $data['ID']; ?>" class="btn btn-sm editar">
                                <i class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <?php
                                if ($data['ESTADO'] == 1) {
                                    // Si el estado es activo, muestra el botón de Inactivar
                                ?>
                                    <a href="../model/cambiar_estado_inspetor.php?ID=<?php echo $data['ID']; ?>&ESTADO=0" class="btn btn-sm inactivo"><i class="bi bi-slash-circle"></i></a>
                                <?php
                                } else {
                                    // Si el estado es inactivo, muestra el botón de Activar
                                ?>
                                    <a href="../model/cambiar_estado_inspetor.php?ID=<?php echo $data['ID']; ?>&ESTADO=1" class="btn btn-sm activo"><i class="bi bi-check-circle-fill"></i></a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>