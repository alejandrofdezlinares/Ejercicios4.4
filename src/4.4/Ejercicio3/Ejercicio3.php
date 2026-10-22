<?php
session_start();
// Crear los productos la primera vez
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = [
        'raton' => [
            'precio' => 30,
            'detalle' => 'Raton inalambrico para ordenador'
        ],
        'teclado' => [
            'precio' => 33,
            'detalle' => 'Teclado para jugar y escribir'
        ],
        'monitor' => [
            'precio' => 350,
            'detalle' => 'Monitor para ordenador'
        ],
        'joystick' => [
            'precio' => 90,
            'detalle' => 'Mando para videojuegos'
        ]
    ];
}

// Recuperar la cesta de la cookie
$cesta = [];

if (isset($_COOKIE['cesta'])) {
    $cesta = json_decode($_COOKIE['cesta'], true);

    if (!is_array($cesta)) {
        $cesta = [];
    }
}

// Añadir un producto
if (isset($_GET['comprar'])) {
    $nombre = $_GET['comprar'];

    if (isset($_SESSION['productos'][$nombre])) {
        if (isset($cesta[$nombre])) {
            $cesta[$nombre]++;
        } else {
            $cesta[$nombre] = 1;
        }
    }

    setcookie('cesta', json_encode($cesta), time() + (86400 * 30), '/');

    header('Location: Ejercicio3.php');
    exit;
}

// Contar todos los productos de la cesta
$totalProductos = array_sum($cesta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
</head>
<body>

<h1>Tienda</h1>

<p>
    <a href="cesta.php">CESTA (<?php echo $totalProductos; ?>)</a>
</p>

<table border="1" cellpadding="10">
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Comprar</th>
    </tr>

    <?php foreach ($_SESSION['productos'] as $nombre => $datos) { ?>
        <tr>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $datos['precio']; ?> euros</td>
            <td>
                <a href="detalle.php?producto=<?php echo $nombre; ?>">
                    <img src="imagenes/<?php echo $nombre; ?>.jpg"
                         width="80" alt="<?php echo $nombre; ?>">
                </a>
            </td>
            <td>
                <a href="Ejercicio3.php?comprar=<?php echo $nombre; ?>">
                    Comprar
                </a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
