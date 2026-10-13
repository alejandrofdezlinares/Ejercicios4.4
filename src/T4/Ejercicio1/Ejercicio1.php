
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
    <title>Ejercicio1</title>

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
            background-image: none;
            border: 1px solid black;
            color: black;
            font-size: 25px;
            cursor: pointer;
        }

        .c1 { background-position: 0 0; }
        .c2 { background-position: -100px 0; }
        .c3 { background-position: -200px 0; }
        .c4 { background-position: 0 -100px; }
        .c5 { background-position: -100px -100px; }
        .c6 { background-position: -200px -100px; }
        .c7 { background-position: 0 -200px; }
        .c8 { background-position: -100px -200px; }
        .c9 { background-position: -200px -200px; }
    </style>
</head>

<body>

<h1>Adivina la imagen</h1>

<?php if ($mensaje == "acierto") { ?>

    <h2>¡Felicidades! Has acertado.</h2>
    <img src="gato.jpg" width="300">

<?php } elseif ($mensaje == "fallo") { ?>

    <h2>Has fallado. Inténtalo de nuevo.</h2>

    <form action="Ejercicio1.php" method="get">
        <input type="submit" value="Volver">
    </form>

<?php } else { ?>

    <table border="1">
        <?php
        for ($i = 1; $i <= 9; $i++) {
            if ($i == 1 || $i == 4 || $i == 7) {
                echo "<tr>";
            }
        ?>

            <td>
                <button type="button"
                        class="cuadrado c<?php echo $i; ?>"
                        id="c<?php echo $i; ?>"
                        onclick="mostrar(<?php echo $i; ?>)">
                    ?
                </button>
            </td>

        <?php
            if ($i == 3 || $i == 6 || $i == 9) {
                echo "</tr>";
            }
        }
        ?>
    </table>

    <br>

    <form action="Ejercicio1.php" method="post">
        ¿Qué aparece en la imagen?
        <input type="text" name="respuesta" required>
        <input type="submit" value="Comprobar">
    </form>

    <script>
        function mostrar(numero) {
            var cuadrado = document.getElementById("c" + numero);

            cuadrado.style.backgroundImage = 'url("gato.jpg")';
            cuadrado.style.backgroundSize = "300px 300px";
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

<?php } ?>

</body>
</html>
