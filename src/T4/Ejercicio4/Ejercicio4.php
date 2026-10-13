
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 4</title>
</head>
<body>

<h2>Bloques y pisos</h2>

<table border="1">
    <tr>
        <th>Bloque</th>
        <th>Piso</th>
        <th>Llamar</th>
    </tr>

    <?php
    for ($bloque = 1; $bloque <= 10; $bloque++) {
        for ($piso = 1; $piso <= 7; $piso++) {
            echo "<tr>";
            echo "<td>$bloque</td>";
            echo "<td>$piso</td>";
            echo "<td>
                <form action='Ejercicio4.php' method='post'>
                    <input type='hidden' name='bloque' value='$bloque'>
                    <input type='hidden' name='piso' value='$piso'>
                    <input type='submit' value='Llamar'>
                </form>
            </td>";
            echo "</tr>";
        }
    }
    ?>
</table>

<?php
if (isset($_POST['bloque']) && isset($_POST['piso'])) {
    $bloque = $_POST['bloque'];
    $piso = $_POST['piso'];

    echo "<h3>Usted ha llamado al piso $piso del bloque $bloque</h3>";
}
?>

</body>
</html>
