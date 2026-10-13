<?php
$mensaje = "";

if (isset($_POST["respuesta"])) {
    $respuesta = strtolower(trim($_POST["respuesta"]));

    if ($respuesta == "gato") {
        $mensaje = "acierto";
    } else {
        $mensaje = "fallo";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Adivina la imagen</title>

    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 100px;
            height: 100px;
            padding: 0;
        }

        .cuadrado {
            width: 100px;
            height: 100px;
            background-color: white;
            border: 1px solid black;
            font-size: 25px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h1>Adivina la imagen</h1>

<?php
if ($mensaje == "acierto") {
    echo "<h2>¡Felicidades! Has acertado.</h2>";
    echo '<img src="gato.jpg" width="300">';

} elseif ($mensaje == "fallo") {
    echo "<h2>Has fallado. Inténtalo de nuevo.</h2>";
    echo '<form action="Ejercicio6.php" method="get">';
    echo '<input type="submit" value="Volver">';
    echo '</form>';

} else {
?>

<table border="1">
    <?php
    for ($fila = 0; $fila < 3; $fila++) {
        echo "<tr>";

        for ($columna = 0; $columna < 3; $columna++) {
            $numero = $fila * 3 + $columna + 1;

            echo "<td>";
            echo '<button type="button"
                    class="cuadrado"
                    id="c' . $numero . '"
                    onclick="mostrar(' . $numero . ')">?</button>';
            echo "</td>";
        }

        echo "</tr>";
    }
    ?>
</table>

<br>

<form action="Ejercicio6.php" method="post">
    ¿Qué aparece en la imagen?
    <input type="text" name="respuesta" required>
    <input type="submit" value="Comprobar">
</form>

<script>
function mostrar(numero) {
    var cuadrado = document.getElementById("c" + numero);

    var fila = Math.floor((numero - 1) / 3);
    var columna = (numero - 1) % 3;

    cuadrado.style.backgroundImage = 'url("gato.jpg")';
    cuadrado.style.backgroundSize = "300px 300px";
    cuadrado.style.backgroundPosition =
        (-columna * 100) + "px " + (-fila * 100) + "px";
    cuadrado.style.backgroundRepeat = "no-repeat";

    cuadrado.innerHTML = "";
    cuadrado.disabled = true;

    setTimeout(function() {
        cuadrado.style.backgroundImage = "none";
        cuadrado.innerHTML = "?";
        cuadrado.disabled = false;
    }, 2000);
}
</script>

<?php
}
?>

</body>
</html>
