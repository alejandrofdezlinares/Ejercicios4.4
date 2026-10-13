<?php

for ($i = 1; $i <= 6; $i++) {
    $numeros[$i] = $_POST["n".$i];
}

$serie = $_POST["serie"];

// Generar los 6 números aleatorios
for ($i = 1; $i <= 6; $i++) {
    $generados[$i] = rand(1, 49);
}


// Generar la serie
$serieGenerada = rand(1, 999);

?>

<html>
<head>
    <title>Lotería Primitiva</title>
</head>
<body>

<h1>Resultado de la Primitiva</h1>

<table border="1">
    <tr>
        <th>Combinación</th>
        <th>Números</th>
        <th>Serie</th>
    </tr>

    <tr>
        <td>Generada</td>
        <td><?php echo implode(" - ", $generados); ?></td>
        <td><?php echo $serieGenerada; ?></td>
    </tr>

    <tr>
        <td>Introducida</td>
        <td><?php echo implode(" - ", $numeros); ?></td>
        <td><?php echo $serie; ?></td>
    </tr>
</table>

<br>

<a href="Ejercicio2.html">Volver a jugar</a>

</body>
</html>