<?php
session_start();

// Recuperar los votos de la cookie
if (isset($_COOKIE['votos'])) {
    $votos = json_decode($_COOKIE['votos'], true);
} else {
    $votos = ['si' => 0, 'no' => 0];
}

// Contabilizar el voto
if (isset($_POST['respuesta'])) {
    $respuesta = $_POST['respuesta'];
    $votos[$respuesta]++;

    $_SESSION['votos'] = $votos;

    // Guardar la cookie durante 3 meses
    setcookie('votos', json_encode($votos), time() + (90 * 24 * 60 * 60), '/');

    header('Location: Ejercicio2.php');
    exit;
}

// Recuperar los resultados actualizados
if (isset($_COOKIE['votos'])) {
    $votos = json_decode($_COOKIE['votos'], true);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Encuesta</title>
</head>
<body>

<h3>¿Crees que actualmente hay corrupción en el gobierno?</h3>

<p>
    <strong>SI</strong>
    
    <?php
    for ($i = 0; $i < $votos['si']; $i++) {
        echo "<span style='color: green;'>X</span>";
    }
    ?>
</p>

<p>
    <strong>NO</strong>

    <?php
    for ($i = 0; $i < $votos['no']; $i++) {
        echo "<span style='color: red;'>X</span>";
    }
    ?>
</p>

<form method="post">
    <button type="submit" name="respuesta" value="si">SI</button>
    <button type="submit" name="respuesta" value="no">NO</button>
</form>

</body>
</html>
