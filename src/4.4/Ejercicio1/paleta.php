<?php
session_start();

$colores = $_SESSION['colores'] ?? [];
$fondo = $_SESSION['fondo'] ?? 'white';

if (isset($_POST['color'])) {
    $colorElegido = $_POST['color'];

    if (in_array($colorElegido, $colores, true)) {
        $_SESSION['fondo'] = $colorElegido;
        $fondo = $colorElegido;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paleta de colores</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 120px;
            height: 80px;
            border: 2px solid black;
            text-align: center;
        }
    </style>
</head>
<body style="background-color: <?= htmlspecialchars($fondo) ?>;">

    <h1>Paleta de colores</h1>

    <table>
        <?php foreach (array_chunk($colores, 5) as $fila): ?>
            <tr>
                <?php foreach ($fila as $color): ?>
                    <td style="background-color: <?= htmlspecialchars($color) ?>;">
                        <form method="post">
                            <button type="submit" name="color"
                                value="<?= htmlspecialchars($color) ?>">
                                <?= htmlspecialchars($color) ?>
                            </button>
                        </form>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php if (empty($colores)): ?>
        <p>Aún no has añadido colores.</p>
    <?php endif; ?>

    <form action="Ejercicio1.php" method="get">
        <button type="submit">Volver a la página principal</button>
    </form>

    <form action="nueva.php" method="post">
        <button type="submit">Crear nueva paleta</button>
    </form>

</body>
</html>
