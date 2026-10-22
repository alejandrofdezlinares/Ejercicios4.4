<?php
session_start();

// Comprobar que existen los productos
if (!isset($_SESSION['productos'])) {
    header('Location: Ejercicio3.php');
    exit;
}

$productos = $_SESSION['productos'];

// Recuperar la cesta de la cookie
$cesta = [];

if (isset($_COOKIE['cesta'])) {
    $cesta = json_decode($_COOKIE['cesta'], true);

    if (!is_array($cesta)) {
        $cesta = [];
    }
}

// Eliminar una unidad
if (isset($_GET['eliminar'])) {
    $nombre = $_GET['eliminar'];

    if (isset($cesta[$nombre])) {
        $cesta[$nombre]--;

        if ($cesta[$nombre] <= 0) {
            unset($cesta[$nombre]);
        }
    }

    setcookie('cesta', json_encode($cesta), time() + (86400 * 30), '/');

    header('Location: cesta.php');
    exit;
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cesta</title>
</head>
<body>

<h1>Productos en tu cesta</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Eliminar</th>
    </tr>

    <?php foreach ($cesta as $nombre => $cantidad) {
        if (!isset($productos[$nombre])) {
            continue;
        }

        $precio = $productos[$nombre]['precio'];
        $subtotal = $precio * $cantidad;
        $total += $subtotal;
    ?>
        <tr>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $cantidad; ?></td>
            <td>
                <img src="imagenes/<?php echo $nombre; ?>.jpg"
                     width="60" alt="<?php echo $nombre; ?>">
            </td>
            <td><?php echo $subtotal; ?> euros</td>
            <td>
                <a href="cesta.php?eliminar=<?php echo $nombre; ?>">
                    Eliminar
                </a>
            </td>
        </tr>
    <?php } ?>

    <tr>
        <td colspan="3">Total</td>
        <td><?php echo $total; ?> euros</td>
        <td></td>
    </tr>
</table>

<p><a href="Ejercicio3.php">Volver a la tienda</a></p>

</body>
</html>
