<?php
include_once "../config/config.php";

// Consulta SQL para obtener los registros de la tabla (cambiar 'nombre_de_la_tabla' por el nombre de tu tabla)
$sql = "SELECT * FROM  coordenadas_erroneas";
$result = $con->query($sql);

// Comprobar si se obtuvieron resultados
if ($result->num_rows > 0) {
    // Encabezados del archivo CSV
    $csv_filename = 'registros.csv';
    $csv_handler = fopen($csv_filename, 'w');

    // Escribir los encabezados
    fputcsv($csv_handler, array('DIRECCION', 'CODIGO', 'DIRECCION_ACTUAL')); // Cambiar 'Campo1', 'Campo2', 'Campo3' por los nombres de tus columnas

    // Recorrer los resultados y escribir cada registro en el archivo CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($csv_handler, $row);
    }

    // Cerrar el archivo CSV
    fclose($csv_handler);

    // Descargar el archivo CSV
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=$csv_filename");
    readfile($csv_filename);

    // Eliminar el archivo CSV después de descargarlo (opcional)
    unlink($csv_filename);
} else {
    echo "No se encontraron registros en la tabla.";
}

// Cerrar la conexión a la base de datos
$con->close();
?>
