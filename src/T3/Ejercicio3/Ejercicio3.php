<?php
$fondo = $_POST['fondo'];
$fuente = $_POST['fuente'];
$alineacion = $_POST['alineacion'];
$banner = $_POST['banner'];
$color = $_POST['color'];
$tamano = $_POST['tamano'];
$colorTitulo = $_POST['colorTitulo'];
$titulo = $_POST['titulo'];

if ($banner == "Sevilla.jpg") {
    $ciudad = "Sevilla";
    $descripcion = "Sevilla es famosa por la plaza de España.";
} elseif ($banner == "Madrid.jpg") {
    $ciudad = "Madrid";
    $descripcion = "Madrid es la capital de España.";
} else {
    $ciudad = "Barcelona";
    $descripcion = "Barcelona es famosa por la Sagrada Familia.";
}
?>

<html>
<body bgcolor="<?php echo $fondo; ?>">

<center>
    <img src="<?php echo $banner; ?>" width="800" height="400">
</center>

<font face="<?php echo $fuente; ?>" color="<?php echo $color; ?>" size="<?php echo $tamano; ?>">

<h1 align="<?php echo $alineacion; ?>">
    <font color="<?php echo $colorTitulo; ?>">
        <?php echo $titulo; ?>
    </font>
</h1>

<h2><?php echo $ciudad; ?></h2>
<p><?php echo $descripcion; ?></p>

</font>

<a href="Ejercicio3.html">Volver al formulario</a>

</body>
</html>