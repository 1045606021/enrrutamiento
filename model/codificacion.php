<?php
include_once "../config/config.php";
include_once "insertar_direccionesBD.PHP";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>codificacion.php</title>
</head>

<!-- <a href="insertar_direccionesBD.PHP"><h4>insertar registro a la base de datos</h4></a><br> -->
<body style="background: #BFC9CA">
    <?php
    function dividir_codigo($codigo)
    {
        $campos = array(
            substr($codigo, 0, 2),
            substr($codigo, 2, 2),
            substr($codigo, 4, 1),
            substr($codigo, 5, 3),
            substr($codigo, 8, 3),
            substr($codigo, 11, 3),
            substr($codigo, 14, 4),
        );
        $valor_tercer_campo = obtener_valor_tercer_campo($codigo);

        return array($campos, $valor_tercer_campo);
    }
    function obtener_valor_tercer_campo($codigo)
    {
        if (strlen($codigo) == 18) {
            $tercer_campo = substr($codigo, 4, 1);
            $mapeo_tercer_campo = [
                '1' => "Cl.",
                '2' => "Cra.",
                '3' => "Av.",
                '5' => "Cq.",
                '7' => "Dg.",
                '9' => "Tv.",
            ];
            $valor_anterior = $mapeo_tercer_campo[$tercer_campo];
            return $valor_anterior;
        }
    }
    function invertir_valor($tercer_campo)
    {
        $array = [
            'Cl.' => "#",
            'Cra.' => "#",
            'Av.' => "#",
            'Cq.' => "#",
            'Dg.' => "#",
            'Tv.' => "#",

            // 'cl' => "cr",
            // 'cr' => "cl",
            // 'av' => "dg",
            // 'dg' => "av",
            // 'cq' => "tv",
            // 'tv' => "cq",
        ];
        if (isset($array[$tercer_campo])) {
            return $array[$tercer_campo];
        }
    }
    function sexto_campo($extraer_sexto_campo)
    {
        // extraer ultimos tres digitos posicion 7
        $sexto_campo = substr($extraer_sexto_campo, 11,  3);

        $primer_digito_sexto_campo = substr($sexto_campo, 0, 1);

        $almacena_validacion6 = '';
        if ($primer_digito_sexto_campo !== '0') {
            $almacena_validacion6 = $sexto_campo;
        } else {
            // Si el primer dígito es '0', se imprimen los dos últimos dígitos | el 1 significa que toma los despues del 1
            $almacena_validacion6 = substr($sexto_campo, 1);
        }
        return $almacena_validacion6;
    }
    function septimo_campo($extraer_septimo_campo)
    {
        // extraer eltimos tres digitos posicion 7           
        $septimo_campo = substr($extraer_septimo_campo, 14,  4);
        $ultimos_tres_digitos = substr($septimo_campo, -3);
        $almacena_validacion7 = '';
        if ($ultimos_tres_digitos  !== '0') {
            $almacena_validacion7 = $ultimos_tres_digitos;
        }
        // extración primer digito posicion [14] si es = 0
        $septima_posicion = substr($extraer_septimo_campo, 14,  1);
        $almacena_primer_digito7 = '';
        if ($septima_posicion  !== '0') {
            $almacena_primer_digito7 = $septima_posicion;
        }
        // validar si el ultimo campo es cero o no 
        if ($almacena_validacion7 == '0') {
            echo ' ';
        } else {
            return $almacena_primer_digito7 . $almacena_validacion7;
        }
    }
    function primer_campo_sector($extraer_primer_campo_sector)
    {
        $primercampo_sector_municipio = substr($extraer_primer_campo_sector[0], 0, 2);
        $primercampo_sector = [
            '00' => 'Caldas',
            '01' => 'Sabaneta',
            '02' => 'Envigado',
            '03' => 'La Estrella',
            '04' => 'Medellin',
            '05' => 'Medellín',
            '06' => 'Medellin',
            '07' => 'ltagui',
            '08' => 'Medellin',
            '09' => 'Bello',
            '20' => 'Copacabana',
            '21' => 'Girardota',
            '22' => 'Barbosa',
            '23' => 'Don Matias',
            '24' => 'Gómez Plata',
            '25' => 'Carolina',
            '26' => 'Guadalupe',
            '27' => 'San Pedro de Los Milagros',
            '28' => 'Entrerrios',
            '30' => 'Guarne',
            '31' => 'Marinilla',
            '32' => 'El Santuario',
            '33' => 'Rionegro',
            '34' => 'El Carmen de Viboral',
            '35' => 'La Ceja',
            '36' => 'El Retiro',
            '37' => 'El Peñol',
            '38' => 'Guatapé',
            '39' => 'San Rafael',
            '41' => 'Santa Rosa',
            '43' => 'Angostura',
            '44' => 'La Unión',
            '45' => 'Mesopotamia',
            '70' => 'Medellín',
            '77' => 'ltagui',
        ];
        if (isset($primercampo_sector[$primercampo_sector_municipio])) {
            return $primercampo_sector[$primercampo_sector_municipio];
        }
    }
    function asignar_sur_si_es_medellin($extraer_sur)
    {
        // validar si es sur o no 
        $extraer_sur = substr($extraer_sur[0], 0, 2);
        $resultado_original = primer_campo_sector($extraer_sur);
        // Realizar la validación adicional para asignar 'sur' en ciertos casos específicos
        if ($extraer_sur == '04' || $extraer_sur == '02' || $extraer_sur == '01'  || $extraer_sur == '03' || $extraer_sur == '00' || $extraer_sur == '77') {
            return 'Sur';
        }
        return $resultado_original;
    }
    function validar_08_cr($primercampo_digito_sector)
    {
        // validar si es medellin || pasa de 100 o si ya es mas de 100 y asignar (1)
        // esto valida si se le asigna un 1 al lado de la calle o no 
        $permitidos = ["08"];
        $primercampo_digito_sectorES = substr($primercampo_digito_sector, 0, 2);
        // (( "in_array" )) Esta función busca $primercampo_digito_sector en $permitidos y valida, si esta, le asigna los valores.
        $medellin1 = in_array($primercampo_digito_sectorES, $permitidos) ? 1 : '';
        return $medellin1;
    }
    function si_es_caldas1($primercampo_digito_sector)
    {
        // validar si es medellin || pasa de 100 o si ya es mas de 100 y asignar (1)
        // esto valida si se le asigna un 1 al lado de la calle o no 
        $permitidos = ["00"];
        $primercampo_digito_sectorES = substr($primercampo_digito_sector, 0, 2);
        // (( "in_array" )) Esta función busca $primercampo_digito_sector en $permitidos y valida, si esta, le asigna los valores.
        $medellin1 = in_array($primercampo_digito_sectorES, $permitidos) ? 1 : '';
        return $medellin1;
    }
    function validar_siEs_medellin_asignar1_06($validar_siEs_06_y_asignar1)
    {
        // validar si es medellin || pasa de 100 o si ya es mas de 100 y asignar (1)
        // esto valida si se le asigna un 1 al lado de la calle o no 
        $permitidos = ["06"];
        $primercampo_digito_sectorES = substr($validar_siEs_06_y_asignar1, 0, 2);
        // (( "in_array" )) Esta función busca $primercampo_digito_sector en $permitidos y valida, si esta, le asigna los valores.
        $validar_siIniciaCon_06 = in_array($primercampo_digito_sectorES, $permitidos) ? 1 : '';
        return $validar_siIniciaCon_06;
    }
    function validar_primer_campo_vasio_valor($segundo_cam_vasido_valor)
    {
        $validar_primer_campo_vasio_valor = substr($segundo_cam_vasido_valor[1], 0, 1);
        // $almacena_validacion2 = '';
        // if ($validar_primer_campo_vasio_valor !== '0') {
        //     $almacena_validacion2 = $validar_primer_campo_vasio_valor;
        //     return $almacena_validacion2;
        // }
        return $validar_primer_campo_vasio_valor;
    }
    function obtenerCodigosInstalacion($con)
    {
        $codigo_instalacion = array();
        $sql = "SELECT ID_CODIGO_INSTALACION FROM coordenada";
        $result = $con->query($sql);

        if (!$result) {
            die("Error en la consulta: " . $con->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $codigo_instalacion[] = $row["ID_CODIGO_INSTALACION"];
            }
        } else {
            echo "No se encontraron resultados en la base de datos.";
        }

        return $codigo_instalacion;
    }
    function procesarCodigos($con)
    {
        $resultados = array();
        $codigosInstalacion = obtenerCodigosInstalacion($con);

        foreach ($codigosInstalacion as $codigo_instalacion) {
            list($campos_divididos, $valor_tercer_campo) = dividir_codigo($codigo_instalacion);

            $primer_digito_cuarto_campo = substr($campos_divididos[3], 0, 1);

            $segundo_digito_cuarto_campo_para_primeroDe_direcc = substr($campos_divididos[3], 1, 1);
            $array_validacion = [
                1 => 'a',
                2 => 'b',
                3 => 'c',
                4 => 'd',
                5 => 'e',
                6 => 'f',
                7 => 'g',
                8 => 'h',
                9 => 'i',
            ];
            if (array_key_exists($segundo_digito_cuarto_campo_para_primeroDe_direcc, $array_validacion)) {
                $segunda_letra_tercer_digito = $array_validacion[$segundo_digito_cuarto_campo_para_primeroDe_direcc];
            } else {
                $segunda_letra_tercer_digito = '';
            }
            $tercer_digito_cuarto_campo_para_letra = substr($campos_divididos[3], 2, 1);
            $array_validacion = [
                1 => 'a',
                2 => 'b',
                3 => 'c',
                4 => 'd',
                5 => 'e',
                6 => 'f',
                7 => 'g',
                8 => 'h',
                9 => 'i',
            ];
            if (array_key_exists($tercer_digito_cuarto_campo_para_letra, $array_validacion)) {
                $letra_tercer_digito = $array_validacion[$tercer_digito_cuarto_campo_para_letra];
            } else {
                $letra_tercer_digito = '';
            }
            $letras_crucero = substr($campos_divididos[4], 1, 1);
            $array_validacion = [
                1 => 'a',
                2 => 'b',
                3 => 'c',
                4 => 'd',
                5 => 'e',
                6 => 'f',
                7 => 'g',
                8 => 'h',
                9 => 'i',
            ];
            if (array_key_exists($letras_crucero, $array_validacion)) {
                $letras_del_crucero = $array_validacion[$letras_crucero];
            } else {
                $letras_del_crucero = '';
            }
            $letras_crucero = substr($campos_divididos[4], 2, 1);
            $array_validacion = [
                1 => 'a',
                2 => 'b',
                3 => 'c',
                4 => 'd',
                5 => 'e',
                6 => 'f',
                7 => 'g',
                8 => 'h',
                9 => 'i',
            ];
            if (array_key_exists($letras_crucero, $array_validacion)) {
                $letras_crucero_segundo_digito = $array_validacion[$letras_crucero];
            } else {
                $letras_crucero_segundo_digito = '';
            }
            $segundo_digito_segundo_campo = substr($campos_divididos[1], 1, 1);

            $primer_digito_segundo_campo = validar_primer_campo_vasio_valor($campos_divididos);

            $segundo_digito_cuarto_campo = substr($campos_divididos[4], 0, 1);

            $tercer_campo = obtener_valor_tercer_campo($codigo_instalacion);

            $crucero_numeral = invertir_valor($tercer_campo);

            $almacena_validacion6 = sexto_campo($codigo_instalacion);

            $almacena_validacion7 = septimo_campo($codigo_instalacion);

            $primercampo_sector = primer_campo_sector($campos_divididos);

            $validar_siEs_sur = asignar_sur_si_es_medellin($campos_divididos);

            $validar_siIniciaCon_08 = validar_08_cr($codigo_instalacion);

            $medellin1 = validar_siEs_medellin_asignar1_06($codigo_instalacion);

            $si_es_caldas1 = si_es_caldas1($codigo_instalacion);


            /////////////////////////////////////////////////////////////////
            $direccion = '';


            if ($valor_tercer_campo == 'Cl.') {
                $direccion = $valor_tercer_campo . ' ' . $si_es_caldas1. $medellin1 . $primer_digito_segundo_campo . $primer_digito_cuarto_campo
                    . $segunda_letra_tercer_digito  . $letra_tercer_digito . ' ' . "$validar_siEs_sur". ' ' . $crucero_numeral . $validar_siIniciaCon_08
                    . $segundo_digito_segundo_campo . $segundo_digito_cuarto_campo .  "$letras_del_crucero" . "$letras_crucero_segundo_digito"
                    . "-$almacena_validacion6" . ' ' . "$almacena_validacion7" . ' ' . $primercampo_sector;


            } elseif ($valor_tercer_campo == 'Cra.') {
                $direccion = $valor_tercer_campo . ' '  . $validar_siIniciaCon_08.  $segundo_digito_segundo_campo . $primer_digito_cuarto_campo
                    .  $letra_tercer_digito . $segunda_letra_tercer_digito . ' ' . $crucero_numeral .   $si_es_caldas1. $medellin1
                    . $primer_digito_segundo_campo . $segundo_digito_cuarto_campo .  "$letras_del_crucero" . $letras_crucero_segundo_digito  . ' '. "$validar_siEs_sur"
                    . "-$almacena_validacion6" . ' ' . "$almacena_validacion7" . ' ' . $primercampo_sector;
            }   // /////////////////////////////////////////////////////////////////

            elseif ($valor_tercer_campo == 'Dg.') {
                $direccion = $valor_tercer_campo . ' ' . $medellin1 .  $segundo_digito_segundo_campo  . $primer_digito_cuarto_campo
                    . $segunda_letra_tercer_digito . $letra_tercer_digito . ' '  . $crucero_numeral . $primer_digito_segundo_campo
                    . $segundo_digito_cuarto_campo .  "$letras_del_crucero" . "$letras_crucero_segundo_digito" . ' ' .  "$validar_siEs_sur" . ' '
                    . "$almacena_validacion6" . ' ' . "$almacena_validacion7" . ' ' . $primercampo_sector;

            } elseif ($valor_tercer_campo == 'Av.') {
                $direccion = $valor_tercer_campo . ' ' . $segundo_digito_segundo_campo . $primer_digito_cuarto_campo
                    .  $letra_tercer_digito . $segunda_letra_tercer_digito . ' ' . $crucero_numeral . $medellin1
                    . $primer_digito_segundo_campo . $segundo_digito_cuarto_campo .  "$letras_del_crucero" . "$letras_crucero_segundo_digito" . "$validar_siEs_sur"
                    . "-$almacena_validacion6" . ' ' . "$almacena_validacion7" . ' ' . $primercampo_sector;
            }   // /////////////////////////////////////////////////////////////////

            elseif ($valor_tercer_campo == 'Tv.') {
                $direccion = $valor_tercer_campo . ' ' .   $primer_digito_segundo_campo . $primer_digito_cuarto_campo
                    . $letra_tercer_digito  . $segunda_letra_tercer_digito . ' '. "$validar_siEs_sur" . ' ' . $crucero_numeral .$validar_siIniciaCon_08 . $medellin1
                    . $segundo_digito_segundo_campo . $segundo_digito_cuarto_campo .  "$letras_del_crucero" . "$letras_crucero_segundo_digito" . ' '  . ' '
                    . "-$almacena_validacion6" . ' ' . "$almacena_validacion7" . ' ' . $primercampo_sector;
            }    /////////////////////////////////////////////////////////////////

            elseif ($valor_tercer_campo == 'Cq.') {
                $direccion = $valor_tercer_campo . ' ' .  $segundo_digito_segundo_campo  . $primer_digito_cuarto_campo
                . $letra_tercer_digito  . $segunda_letra_tercer_digito . ' '. "$validar_siEs_sur" . ' ' . $crucero_numeral .$validar_siIniciaCon_08 . $medellin1
                .$primer_digito_segundo_campo  . $segundo_digito_cuarto_campo .  "$letras_del_crucero" . "$letras_crucero_segundo_digito" . ' '  . ' '
                . "-$almacena_validacion6" . ' ' . "$almacena_validacion7" . ' ' . $primercampo_sector;
            }    /////////////////////////////////////////////////////////////////

            // Obtener la dirección actual correspondiente al código
            $sql = "SELECT DIRECCION_ACTUAL, MUNICIPIO FROM coordenada WHERE ID_CODIGO_INSTALACION = '$codigo_instalacion'";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $direccion_actual = $row["DIRECCION_ACTUAL"];
                $municipio = $row["MUNICIPIO"];

            } else {
                $direccion_actual = "Dirección no encontrada";
                $municipio = "Dirección no encontrada";
            }

            $resultados[] = array(
                'codigo' => implode('', $campos_divididos),
                'direccion' => $direccion,
                'direccion_actual' => $direccion_actual,
                'municipio' => $municipio
            );
        }
        return $resultados;
    }


    class imprimir_registros
    {
        function imprimir()
        {
            global $con;
            $imprimir = procesarCodigos($con);
            $resultados = array();
            foreach ($imprimir as $resultado) {
                if (isset($resultado['direccion'])) {
                    $codigo = $resultado['codigo'];
                    $direccion = $resultado['direccion'];
                    $direccion_actual = $resultado['direccion_actual'];
                    $municipio = $resultado['municipio'];

                    $resultados[] = array('codigo' => $codigo, 'direccion' => $direccion, 'direccion_actual' => $direccion_actual, 'municipio' => $municipio );
                }
            }
            return $resultados;
        }
    }

// Crear una instancia de la clase imprimir_registros
// $impresor = new imprimir_registros();

// // Llamar al método imprimir()
// $resultados = $impresor->imprimir();

// // Imprimir los resultados
// foreach ($resultados as $resultado) {
//     echo "Código: " . $resultado['codigo'] . "<br>";
//     echo "Dirección descodificada: " . $resultado['direccion'] . "<br>";
//     echo "Dirección actual: " . $resultado['direccion_actual'] . "<br>";
//     echo "<br>";
// }

// Cerrar la conexión a la base de datos
$con->close();
?>

</body>

</html>