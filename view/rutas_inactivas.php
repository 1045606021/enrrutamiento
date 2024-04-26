<!-- rutas_inactivas.php -->
<?php
include '../config/config.php';
include "../model/cambiar_estado.php";

$where = 0;

$sqlClientesInactivos = "SELECT * FROM rutas_inactivas WHERE activo = 1 " . $where . " ORDER BY id ASC";
$queryDataInactivos = mysqli_query($con, $sqlClientesInactivos);
$total_inactivos = mysqli_num_rows($queryDataInactivos);
?>

<div class="container">
    <div class="table-container">
        <p class="lead font-weight-bold">RUTAS INACTIVAS: (<span class="total-count"><?php echo $total_inactivos; ?></span>)</p>
        <table class="table table-sm table-bordered table-striped expandida">
            <thead>
                <!-- ... Encabezados de la tabla ... -->
                <tr class="alto">
                        <th >ID</th>
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
                while ($data = mysqli_fetch_array($queryDataInactivos)) {
                    ?>
                    <!-- ... Filas de la tabla para rutas inactivas ... -->
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
                            <th> <?php echo $data['estado']; ?></th>
                            <th> <?php echo $data['tipo_agenda']; ?></th>
                            <th> <?php echo $data['jornada']; ?></th>
                            <th> <?php echo $data['sub_zonas']; ?></th>
                            <th> <?php echo $data['zona']; ?></th>
                            <th> <?php echo $data['inspector']; ?></th>

                            <td><a href="editar.php?id=<?php echo $data['id']; ?>" class="btn btn-sm editar">
                            <i class="bi bi-pencil-square"></i></a></td>

                            <td>
                                <?php
                                if ($data['estado'] == 1) {
                                ?>
                                    <a href="../model/cambiar_estado.php?id=<?php echo $data['id']; ?>&estado=0" class="btn btn-sm inactivo"><i class="bi bi-slash-circle"></i></a>
                                <?php
                                } else {
                                ?>
                                    <a href="../model/cambiar_estado.php?id=<?php echo $data['id']; ?>&estado=1" class="btn btn-sm activo"><i class="bi bi-check-circle-fill"></i></a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

