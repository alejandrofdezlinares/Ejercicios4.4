
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>

    <h1>Resultado del llenado</h1>

    <?php

    $diametro = $_POST["diametro"];
    $altura = $_POST["altura"];
    $caudal = $_POST["caudal"];

    $radio = $diametro / 2;

    $volumen = pi() * $radio * $radio * $altura * 1000;

    $tiempo = $volumen / $caudal;

    $horas = floor($tiempo / 60);
    $minutos = floor(fmod($tiempo, 60));

    echo "Volumen: " . round($volumen, 2) . " litros";
    echo "<br><br>";
    echo "Tiempo de llenado: " . $horas . " horas y " . $minutos . " minutos";

    ?>

    <br><br>
    <a href="Ejercicio5.html">Volver</a>

</body>
</html>
