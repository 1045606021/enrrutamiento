<?php
include '../controller/editar_ruta.php';
?>
<!DOCTYPE html>
<html>
<!--<h5>prometo a Dios, a mi patria y a mi institusion, ser fiel a los principios filosoficos que han 
orientado mi formacion humana y cristiana para construir una sociedad sobre los fundamentos del respeto, 
la honestidad, la justicia y la responsabilidad, base fundamental de los derechos humanos.</h5> -->
<!-- Subir (mt-):
Bajar (mb-):
Hacia la izquierda (ml-):
Hacia la derecha (mr-): -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="img/css" rel="shortcut icon" href="../img/icono.png" />
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../css/cssGenerales.css"> -->
    <link rel="stylesheet" type="text/css" href="..//css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>index</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light  text-light">
        <a class="navbar-brand" >                                   <img src="../img/icono.png" alt="Logo"      height="60"></a>
        <a class="nav-link font-weight-bold text-shadow h6"         href="../index.php">                        INICIO <span class="underline"></span></a>
        <a class="nav-link font-weight-bold text-shadow h6"         href="index_inspector.php">                 VER INSPECTORES<span class="underline"></span></a>
        <a class="nav-link font-weight-bold text-shadow h6"         href="agregar_registro.php">                AGREGAR RUTA <span class="underline"></span></a>
        <a class="nav-link font-weight-bold text-shadow h6"         href="coordenadas.php" target="_blank">     COORDENADAS<span class="underline"></span></a>
        <form class="form-inline mr-5">
            <div class="input-group">
                <input class="form-control" type="search" name="busqueda" placeholder="Buscar" aria-label="Buscar">
                <div class="input-group-append">
                    <button class="btn btn-light" name="enviar" type="submit">Buscar</button>
                </div>
            </div>
        </form>
        -
        <form action="../model/recibe_excel_validando.php" method="POST" enctype="multipart/form-data" class="form-inline">
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="dataRutas" class="custom-file-input">
                    <label class="custom-file-label btn elegir-excel  ">Elegir Archivo</label>
                </div>
                <div class="input-group-append"><button class="btn btn-light subir-excel" name="dataRutas" type="submit">Subir</button></div>
            </div>
        </form>
    </nav><br><br>


    <?php
    $con = mysqli_connect("localhost", "root", "", "proyecto_empresa");
    $where = "";
    if (isset($_GET['enviar'])) {
        $busqueda = $_GET['busqueda'];
        if (isset($_GET['busqueda'])) {
            $where = "WHERE rutas.

                fecha_programacion          LIKE '%"   . $busqueda . "%' or
                requerimiento               LIKE '%"   . $busqueda . "%' or
                orden_trabajo               LIKE '%"   . $busqueda . "%' or
                direccion                   LIKE '%"   . $busqueda . "%' or
                codigo_instalacion          LIKE '%"   . $busqueda . "%' or
                municipio                   LIKE '%"   . $busqueda . "%' or
                usuario                     LIKE '%"   . $busqueda . "%' or
                telefono                    LIKE '%"   . $busqueda . "%' or
                categoria                   LIKE '%"   . $busqueda . "%' or
                observacion_requerimiento   LIKE '%"   . $busqueda . "%' or
                estado_operativo            LIKE '%"   . $busqueda . "%' or
                tipo_agenda                 LIKE '%"   . $busqueda . "%' or
                jornada                     LIKE '%"   . $busqueda . "%' or
                sub_zonas                   LIKE '%"   . $busqueda . "%' or
                zona                        LIKE '%"   . $busqueda . "%' or
                inspector                   LIKE '%"   . $busqueda . "%' ";
        }
    } ?>

    <?php include '../config/config.php';

    $sqlClientes = ("SELECT * FROM rutas " . $where . " ORDER BY id ASC");
    $queryData = mysqli_query($con, $sqlClientes);
    $total_client = mysqli_num_rows($queryData); ?>

    <div class="container">
        <div class="table-container ">
            <div class="total-routes mt-3">
                <p class="lead font-weight-bold">TOTAL DE RUTAS: (<span class="total-count"><?php echo $total_client; ?></span>)</p>
            </div>

            <table class="table table-sm table-bordered table-striped expandida">
                <thead>
                    <tr class="alto">
                        <th>ID </th>
                        <th>FECHA PROGRAMACION</th>
                        <th>REQUERIMIENTO</th>
                        <th>ORDEN TRABAJO</th>
                        <th>DIRECCION</th>
                        <th>CODIGO INSTALACION</th>
                        <th>MUNICIPIO</th>
                        <th>USUARIO</th>
                        <th>TELEFONO</th>
                        <th>CATEGORIA</th>
                        <th>OBSERVACION REQUERIMIENTO</th>
                        <th>ESTADO OPERATIVO</th>
                        <th>TIPO AGENDA</th>
                        <th>JORNADA</th>
                        <th>SUB ZONAS</th>
                        <th>ZONA</th>
                        <th>INSPECTOR</th>
                        <th>EDITAR</th>
                        <th>ESTADO</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_array($queryData)) { ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <th> <?php echo $data['fecha_programacion']; ?></th>
                            <th> <?php echo $data['requerimiento']; ?></th>
                            <th> <?php echo $data['orden_trabajo']; ?></th>
                            <th> <?php echo $data['direccion']; ?></th>
                            <th> <?php echo $data['codigo_instalacion']; ?></th>
                            <th> <?php echo $data['municipio']; ?></th>
                            <th> <?php echo $data['usuario']; ?></th>
                            <th> <?php echo $data['telefono']; ?></th>
                            <th> <?php echo $data['categoria']; ?></th>
                            <th> <?php echo $data['observacion_requerimiento']; ?></th>
                            <th> <?php echo $data['estado_operativo']; ?></th>
                            <th> <?php echo $data['tipo_agenda']; ?></th>
                            <th> <?php echo $data['jornada']; ?></th>
                            <th> <?php echo $data['sub_zonas']; ?></th>
                            <th> <?php echo $data['zona']; ?></th>
                            <th> <?php echo $data['inspector']; ?></th>

                            <td>
                                <a href="editar.php?id=<?php echo $data['id']; ?>" class="btn btn-sm editar">
                                <i class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <?php
                                if ($data['estado'] == 1) {
                                    // Si el estado es activo, muestra el botón de Inactivar
                                ?>
                                    <a href="../model/cambiar_estado.php?id=<?php echo $data['id']; ?>&estado=0" class="btn btn-sm inactivo"><i class="bi bi-slash-circle"></i></a>
                                <?php
                                } else {
                                    // Si el estado es inactivo, muestra el botón de Activar
                                ?>
                                    <a href="../model/cambiar_estado.php?id=<?php echo $data['id']; ?>&estado=1" class="btn btn-sm activo"><i class="bi bi-check-circle-fill"></i></a>
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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>