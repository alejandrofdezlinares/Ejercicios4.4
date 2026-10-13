
<?php
if (isset($_POST["jugar"])) {

    // Obtener los números seleccionados por el usuario
    $seleccionados = isset($_POST["numeros"])
        ? array_map("intval", $_POST["numeros"])
        : [];

    $cantidad = count($seleccionados);

    // Generar 6 números ganadores diferentes
    $ganadores = [];

    while (count($ganadores) < 6) {
        $numero = rand(1, 49);

        if (!in_array($numero, $ganadores)) {
            $ganadores[] = $numero;
        }
    }

    // Generar la serie ganadora
    $serieGanadora = rand(1, 999);
    $serie = intval($_POST["serie"]);

    // Contar los aciertos
    $aciertos = 0;

    foreach ($seleccionados as $numero) {
        if (in_array($numero, $ganadores)) {
            $aciertos++;
        }
    }

    // Calcular el premio
    $premio = 0;

    if ($cantidad <= 6) {
        if ($aciertos == 5) {
            $premio = 30;
        }

        if ($aciertos == 6) {
            $premio = 100;
        }

        if ($serie == $serieGanadora) {
            $premio += 500;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2 - Primitiva</title>

    <style>
        table {
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        .verde {
            color: green;
            font-weight: bold;
        }

        .negro {
            color: black;
            font-weight: bold;
        }

        .rojo {
            color: red;
            font-weight: bold;
        }

        .gris {
            color: gray;
        }
    </style>
</head>

<body>

<h1>Lotería Primitiva</h1>

<form method="post">

    <h3>Selecciona tus números</h3>

    <table>
        <?php
        for ($i = 1; $i <= 49; $i++) {

            // Abrir una fila cada 7 números
            if ($i % 7 == 1) {
                echo "<tr>";
            }

            $marcado = "";

            if (isset($seleccionados) &&
                in_array($i, $seleccionados)) {
                $marcado = "checked";
            }

            echo "<td>";
            echo "<input type='checkbox' name='numeros[]' ";
            echo "value='$i' $marcado>";
            echo $i;
            echo "</td>";

            // Cerrar la fila cada 7 números
            if ($i % 7 == 0) {
                echo "</tr>";
            }
        }
        ?>

        <tr>
            <td colspan="7" style="text-align:center;">
                <input type="checkbox" name="numeros[]"
                    value="49" hidden disabled>
            </td>
        </tr>
    </table>

    <p>
        Número de serie:
        <input type="number" name="serie"
            min="1" max="999" required
            value="<?php echo isset($_POST['serie'])
                ? htmlspecialchars($_POST['serie']) : ''; ?>">
    </p>

    <input type="submit" name="jugar" value="Jugar">

</form>

<?php
if (isset($_POST["jugar"])) {

    echo "<h2>Resultado de la apuesta</h2>";

    if ($cantidad > 6) {

        echo "<h2 style='color:red'>";
        echo "¡Has hecho trampas! Has seleccionado ";
        echo $cantidad . " números.";
        echo "</h2>";

    } else {

        // Mostrar los 49 números con su color correspondiente
        echo "<table>";

        for ($i = 1; $i <= 49; $i++) {

            if ($i % 7 == 1) {
                echo "<tr>";
            }

            // Determinar el color
            if (in_array($i, $seleccionados) &&
                in_array($i, $ganadores)) {

                $color = "verde";

            } elseif (in_array($i, $seleccionados)) {

                $color = "negro";

            } elseif (in_array($i, $ganadores)) {

                $color = "rojo";

            } else {

                $color = "gris";
            }

            echo "<td class='$color'>$i</td>";

            if ($i % 7 == 0) {
                echo "</tr>";
            }
        }

        echo "</table>";

        echo "<h3>Combinación ganadora</h3>";

        foreach ($ganadores as $numero) {
            echo $numero . " ";
        }

        echo "<p>Serie ganadora: $serieGanadora</p>";
        echo "<p>Aciertos: $aciertos</p>";
        echo "<p>Dinero ganado: $premio euros</p>";
    }
}
?>

<h3>Leyenda de colores</h3>

<p style="color:green">Verde: número acertado</p>
<p style="color:black">Negro: número elegido sin acierto</p>
<p style="color:red">Rojo: número ganador no elegido</p>
<p style="color:gray">Gris: número no elegido ni ganador</p>

</body>
</html>
