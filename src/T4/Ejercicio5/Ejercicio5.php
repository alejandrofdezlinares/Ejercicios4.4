
<?php
$filaAbierta = -1;
$columnaAbierta = -1;

if (isset($_GET["fila"]) && isset($_GET["columna"])) {
    $filaAbierta = $_GET["fila"];
    $columnaAbierta = $_GET["columna"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5</title>
</head>
<body>

<h1>Juego de los ojos</h1>

<table border="1">

<?php
for ($fila = 0; $fila < 10; $fila++) {
    echo "<tr>";

    for ($columna = 0; $columna < 10; $columna++) {

        echo "<td>";

        if ($fila == $filaAbierta && $columna == $columnaAbierta) {
            echo '<a href="Ejercicio5.php?fila=' . $fila .
                 '&columna=' . $columna . '">';
            echo '<img src="abierto.jpg" width="50" height="50">';
            echo '</a>';
        } else {
            echo '<a href="Ejercicio5.php?fila=' . $fila .
                 '&columna=' . $columna . '">';
            echo '<img src="cerrado.jpg" width="50" height="50">';
            echo '</a>';
        }

        echo "</td>";
    }

    echo "</tr>";
}
?>

</table>

</body>
</html>
