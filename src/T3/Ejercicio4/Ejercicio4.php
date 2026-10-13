
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $precio1 = $_POST["precio1"];
    $precio2 = $_POST["precio2"];
    $precio3 = $_POST["precio3"];

    $media = ($precio1 + $precio2 + $precio3) / 3;

    $diferencia1 = $precio1 - $media;
    $diferencia2 = $precio2 - $media;
    $diferencia3 = $precio3 - $media;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 4</title>
</head>
<body>

    <h1>Comparación de precios</h1>

    <form action="Ejercicio4.php" method="post">

        <p>Tienda 1:
            <input type="number" name="precio1"
                   step="0.01" min="0" required>
        </p>

        <p>Tienda 2:
            <input type="number" name="precio2"
                   step="0.01" min="0" required>
        </p>

        <p>Tienda 3:
            <input type="number" name="precio3"
                   step="0.01" min="0" required>
        </p>

        <input type="submit" value="Calcular">

    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

        <table border="1" cellpadding="8">

            <tr>
                <th colspan="3">Comparación de precios</th>
            </tr>

            <tr>
                <th>Tienda</th>
                <th>Precio (€)</th>
                <th>Diferencia con la media (€)</th>
            </tr>

            <tr>
                <td>Tienda 1</td>
                <td><?php echo number_format($precio1, 2, ',', '.'); ?></td>
                <td><?php echo number_format($diferencia1, 2, ',', '.'); ?></td>
            </tr>

            <tr>
                <td>Tienda 2</td>
                <td><?php echo number_format($precio2, 2, ',', '.'); ?></td>
                <td><?php echo number_format($diferencia2, 2, ',', '.'); ?></td>
            </tr>

            <tr>
                <td>Tienda 3</td>
                <td><?php echo number_format($precio3, 2, ',', '.'); ?></td>
                <td><?php echo number_format($diferencia3, 2, ',', '.'); ?></td>
            </tr>

            <tr>
                <th>Precio medio</th>
                <th colspan="2">
                    <?php echo number_format($media, 2, ',', '.'); ?> €
                </th>
            </tr>

        </table>

    <?php } ?>

</body>
</html>
