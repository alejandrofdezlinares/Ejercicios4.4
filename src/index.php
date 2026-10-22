<?php
// Si el servidor web apunta a la raíz del proyecto, busca en 'src'.
// Si la raíz del servidor YA ES 'src', busca en el directorio actual.
$dirBase = is_dir(__DIR__ . '/src') ? __DIR__ . '/src' : __DIR__;
$prefixUrl = is_dir(__DIR__ . '/src') ? 'src/' : '';

/**
 * Función recursiva para listar la estructura de archivos
 */
function listarEstructura(string $rutaAbsoluta, string $rutaUrl = ''): void {
    if (!is_dir($rutaAbsoluta)) return;

    $elementos = array_diff(scandir($rutaAbsoluta), ['.', '..']);
    
    // Filtrar para no mostrar index.php, Dockerfile, etc.
    $elementos = array_filter($elementos, function(string $item): bool {
        return !in_array($item, ['index.php', 'Dockerfile', 'compose.yaml', '.vscode', '.git']);
    });

    if (empty($elementos)) return;

    echo "<ul style='list-style:none; padding-left: 20px;'>";

    foreach ($elementos as $elemento) {
        $pathCompleto = $rutaAbsoluta . '/' . $elemento;
        $urlRelativa = $rutaUrl . '/' . rawurlencode($elemento);

        if (is_dir($pathCompleto)) {
            echo "<li style='margin: 8px 0;'>";
            echo "<strong style='color:#569cd6;'>📂 " . htmlspecialchars($elemento) . "</strong>";
            listarEstructura($pathCompleto, $urlRelativa);
            echo "</li>";
        } else {
            $ext = strtolower(pathinfo($elemento, PATHINFO_EXTENSION));
            $color = '#888';
            if ($ext === 'php') $color = '#4f5d95';
            if ($ext === 'html') $color = '#e34c26';

            echo "<li style='margin: 4px 0;'>";
            echo "<span style='background:{$color}; color:#ffffff; padding:2px 6px; border-radius:4px; font-size:11px; margin-right:6px; font-weight:bold;'>" . strtoupper($ext) . "</span>";
            echo "<a href='." . $urlRelativa . "' target='_blank' style='color:#9cdcfe; text-decoration:none;'>" . htmlspecialchars($elemento) . "</a>";
            echo "</li>";
        }
    }

    echo "</ul>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Explorador del Proyecto</title>
    <style>
        body { font-family: sans-serif; background: #1e1e1e; color: #d4d4d4; padding: 20px; }
        .card { background: #252526; border: 1px solid #3c3c3c; border-radius: 8px; padding: 20px; max-width: 600px; }
        a:hover { text-decoration: underline !important; }
    </style>
</head>
<body>

    <h2>📂 Navegador de Archivos</h2>
    <div class="card">
        <?php listarEstructura($dirBase, $prefixUrl ? '/src' : ''); ?>
    </div>

</body>
</html>