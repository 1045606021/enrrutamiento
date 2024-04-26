<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="img/css" rel="shortcut icon" href="../img/icono.png" />
    <title>Formulario de Coordenadas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #172a7391;
            background-image: url('../assets/images/bg1.jpg');
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        /* Estilos cuando se pasa el ratón sobre el botón */
        .boton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body style="background-color:#21354d;">

</head>
<body>


    <form style="background-color:#1C4670;" action="../model/enrrute.php" method="post">
    <a href="../model/direcciones_erroneas.php" class="boton">descargar no encontradas</a>

        <h2>Ingrese las Coordenadas</h2>
        <label for="latitud">Latitud:</label>
        <input type="text" id="latitud" name="latitud" placeholder="6.11156" required><br>
        <label for="longitud">Longitud:</label>
        <input type="text" id="longitud" name="longitud" placeholder="-75.637109" required><br>
        <button type="submit">Descargar</button>
    </form>
</body>
</html>
