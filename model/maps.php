<?php
include_once "../config/config.php";

$sql = "SELECT DIRECCION_ACTUAL, LATITUD, LONGITUD, CODIGO FROM almacena_coordenada";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $direcciones = array();
    while($row = $result->fetch_assoc()) {
        $direcciones[] = $row;
    }
} else {
    echo "0 resultados";
}

$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mapa de Direcciones</title>
    <style>
        #map {
            height: 600px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Añadir sombra */
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2,
                center: {lat: 0, lng: 0},
                mapTypeId: 'roadmap' // Tipo de mapa predeterminado
            });

            var directionsService = new google.maps.DirectionsService();
            var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true});
            directionsDisplay.setMap(map);

            var markers = [];
            var index = 0;

            function calculateRoute() {
                if (index < markers.length - 1) {
                    var start = markers[index].getPosition();
                    var end = markers[index + 1].getPosition();

                    var request = {
                        origin: start,
                        destination: end,
                        travelMode: 'DRIVING'
                    };

                    directionsService.route(request, function(response, status) {
                        if (status === 'OK') {
                            directionsDisplay.setDirections(response);
                            index++;
                            calculateRoute(); // Llamar recursivamente para calcular la siguiente ruta
                        } else {
                            window.alert('No se pudo calcular la ruta: ' + status);
                        }
                    });
                }
            }

            <?php foreach ($direcciones as $index => $direccion): ?>
                var marker = new google.maps.Marker({
                    position: {lat: <?php echo $direccion['LATITUD']; ?>, lng: <?php echo $direccion['LONGITUD']; ?>},
                    map: map,
                    title: '<?php echo $direccion['DIRECCION_ACTUAL']; ?>'
                });

                markers.push(marker);
            <?php endforeach; ?>

            calculateRoute(); 
        }
    </script>



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAet6BC3A-TE6toXKEFBxLcFYscszuNKFw&callback=initMap&callback=initMap" async defer></script>

</body>
</html>

