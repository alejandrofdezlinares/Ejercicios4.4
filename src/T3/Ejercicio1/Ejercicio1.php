
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>

    <h1>Calculo del volúmen de un cilindro</h1>

    <?php
        $altura = $_POST["altura"];
        $diametro = $_POST["diametro"];

        $radio = $diametro / 2;
        $volumen = pi() * $radio * $radio * $altura;

        echo "<h2>Resultado</h2>";
        echo "<p>Altura: $altura cm</p>";
        echo "<p>Diámetro: $diametro cm</p>";
        echo "<p>El volumen es: " . round($volumen, 2) . " cm³</p>";
    ?>

    
    <img src="cilindro.png" alt="Dibujo de un cilindro" width="150">


    <br>
    <a href="Ejercicio1.html">Volver</a>

</body>
</html>
