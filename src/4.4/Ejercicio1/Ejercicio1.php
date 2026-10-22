<?php
session_start();

if (!isset($_SESSION['colores'])) {
    $_SESSION['colores'] = [];
}

if (isset($_POST['añadir'])) {
    $color = sprintf("#%06X", mt_rand(0, 0xFFFFFF));
    $_SESSION['colores'][] = $color;
}

$fondo = !empty($_SESSION['colores'])
    ? end($_SESSION['colores'])
    : "white";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de colores</title>
</head>
<body style="background-color: <?= htmlspecialchars($fondo) ?>;">

    <h1>Generador de colores</h1>

    <form method="post">
        <button type="submit" name="añadir">Añadir color</button>
    </form>

    <br>

    <form action="paleta.php" method="get">
        <button type="submit">Mostrar paleta creada</button>
    </form>

</body>
</html>
