<?php
// Incluir archivo de configuración y conexión a la base de datos
include_once "../config/config.php";

// Consulta para obtener las coordenadas
$sql = "SELECT COORDENADAS_EXTRAIDAS  FROM almacena_coordenada";
$resultado = $con->query($sql);

// Array para almacenar las coordenadas
$coordenadas = array();

// Obtener las coordenadas y agregarlas al array
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        // Asumiendo que las coordenadas están almacenadas en un campo separado por comas
        list($latitud, $longitud) = explode(",", $fila['COORDENADAS_EXTRAIDAS']);
        $coordenadas[] = array("latitud" => $latitud, "longitud" => $longitud);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Mapa con Coordenadas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <style>
        #map { height: 700px; }
    </style>
</head>
<body>
    <div id="map"></div>
    <script>
        var coordenadas = <?php echo json_encode($coordenadas); ?>;

        var map = L.map('map').setView([0, 0], 2);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Iterar sobre las coordenadas y agregar marcadores al mapa
        for (var i = 0; i < coordenadas.length; i++) {
            var latitud = coordenadas[i].latitud;
            var longitud = coordenadas[i].longitud;
            L.marker([latitud, longitud]).addTo(map);
        }
    </script>
</body>
</html>
