<?php
session_start();
// Comprobar que existen los productos
if (!isset($_SESSION['productos'])) {
    header('Location: Ejercicio3.php');
    exit;
}

$productos = $_SESSION['productos'];

// Comprobar el producto seleccionado
if (!isset($_GET['producto'])) {
    header('Location: Ejercicio3.php');
    exit;
}

$nombre = $_GET['producto'];

if (!isset($productos[$nombre])) {
    header('Location: Ejercicio3.php');
    exit;
}

$producto = $productos[$nombre];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del producto</title>
</head>
<body>

<h1><?php echo $nombre; ?></h1>

<img src="imagenes/<?php echo $nombre; ?>.jpg"
     width="300" alt="<?php echo $nombre; ?>">

<p>Precio: <?php echo $producto['precio']; ?> euros</p>

<p>Detalle: <?php echo $producto['detalle']; ?></p>

<p><a href="Ejercicio3.php">Volver a la tienda</a></p>

</body>
</html>
