<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles_bienvenida.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link type="img/css" rel="shortcut icon" href="../img/icono.png" />
    <title>Bienvenida</title>
    <style>
        body {
            background-image: url('../assets/images/bg1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 100vh; /* Establece el mínimo de altura de la ventana gráfica para que el contenido se extienda más allá de la altura de la ventana gráfica */
            position: relative; /* Establece la posición relativa para el cuerpo */
        }
        .logo {
            position: fixed;
            top: 0;
            left: 0;
            width: 150px;
            height: 70px;
            z-index: 9999;
        }
        .elemento {
            margin: 10px;
            padding: 1%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        /* Estilo para el footer */
        footer {
            position: absolute;
            bottom: 0; /* Fija el footer en la parte inferior */
            width: 100%; /* Establece el ancho del footer al 100% del ancho del contenedor */
            background-color: #080c1d92; /* Color de fondo del footer */
            color: white; /* Color del texto del footer */
            padding: 20px 0; /* Espaciado interno del footer */
        }
    </style>
</head>
<body>
    <header>
        <ul class="elemento">
                <img  class="logo" src="../img/icono.png" alt="Logo" class="logo">

            <li><a class="nav-link" href="../model/codificacion.php">Descodificar<span class="underline"></span></a></li>
            <li><a class="nav-link" href="coordenadas.php">Coordenadas<span class="underline"></span></li></a>
            <li><a class="nav-link" href="LAT_LON.PHP">Ingresar Lat y Lon<span class="underline"></span></li></a>
            <li><a class="nav-link" href="../model/maps.php">MAPS<span class="underline"></span></li></a>
            <li><a class="nav-link" href="index_inspector.php">Inspectores<span class="underline"></span></li></a>
            <li><a class="nav-link" href="rutas.php">Rutas<span class="underline"></span></li></a>
            <li><a class="nav-link" href="../model/cerrar_session.php">Cerrar Sesión<span class="underline"></span></li></a>
        </ul>
    </header>

    <div class="container-fluid content">
        <!-- contenido  página -->
    </div>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Contacto</h4>
                    <p>Teléfono:<a href="#"> (604) 4480265</p></a>
                    <p>Correo: <a href="#">pqr@eyc.com.co  </p></a>
                </div>
                <div class="col-md-4">
                    <h4>Síguenos</h4>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fa fa-facebook mr-2"></i>Facebook</a></li>
                        <li><a href="#"><i class="fa fa-whatsapp mr-2"></i>WhatsApp</a></li>
                        <li><a href="#"><i class="fa fa-instagram mr-2"></i>Instagram</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h4>Ubicación</h4>
                    <p>Dirección: <a href="https://www.google.com/maps/place/Cl.+10+Sur+%2348-62,+El+Poblado,
                    +Medell%C3%ADn,+El+Poblado,+Medell%C3%ADn,+Antioquia/@6.1971976,-75.5803072,303m/data=!3m1!1e3!4m6!3m5!1s0x8e46827cad8106b7:
                    0xe5327b63bd337bbe!8m2!3d6.1973053!4d-75.5793608!16s%2Fg%2F11fnx1rrdh?hl=es&entry=ttu"> Cl. 10 Sur #48-62,, País</p></a>
                    <p> Ciudad: Medellín </p>
                    <p>País: Colombia</p>
                
                </div>
            </div>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
