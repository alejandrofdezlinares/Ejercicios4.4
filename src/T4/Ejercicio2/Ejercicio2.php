
<?php
if (isset($_POST["jugar"])) {

    $g1 = rand(1,49);
    $g2 = rand(1,49);
    $g3 = rand(1,49);
    $g4 = rand(1,49);
    $g5 = rand(1,49);
    $g6 = rand(1,49);

    $serieGanadora = rand(1,999);
    $serie = $_POST["serie"];

    $aciertos = 0;

    if (isset($_POST["n".$g1])) $aciertos++;
    if (isset($_POST["n".$g2])) $aciertos++;
    if (isset($_POST["n".$g3])) $aciertos++;
    if (isset($_POST["n".$g4])) $aciertos++;
    if (isset($_POST["n".$g5])) $aciertos++;
    if (isset($_POST["n".$g6])) $aciertos++;

    $premio = 0;

    if ($aciertos == 5) $premio = 30;
    if ($aciertos == 6) $premio = 100;
    if ($serie == $serieGanadora) $premio = $premio + 500;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio2</title>
</head>
<body>

<h1>Lotería Primitiva</h1>

<form method="post">

<h3>Selecciona tus números</h3>

<?php
$n = 1;
?>

<table border="1" cellpadding="8">
<tr>
<td><input type="checkbox" name="n1">1</td>
<td><input type="checkbox" name="n2">2</td>
<td><input type="checkbox" name="n3">3</td>
<td><input type="checkbox" name="n4">4</td>
<td><input type="checkbox" name="n5">5</td>
<td><input type="checkbox" name="n6">6</td>
<td><input type="checkbox" name="n7">7</td>
<td><input type="checkbox" name="n8">8</td>
<td><input type="checkbox" name="n9">9</td>
<td><input type="checkbox" name="n10">10</td>
</tr>
<tr>
<td><input type="checkbox" name="n11">11</td>
<td><input type="checkbox" name="n12">12</td>
<td><input type="checkbox" name="n13">13</td>
<td><input type="checkbox" name="n14">14</td>
<td><input type="checkbox" name="n15">15</td>
<td><input type="checkbox" name="n16">16</td>
<td><input type="checkbox" name="n17">17</td>
<td><input type="checkbox" name="n18">18</td>
<td><input type="checkbox" name="n19">19</td>
<td><input type="checkbox" name="n20">20</td>
</tr>
<tr>
<td><input type="checkbox" name="n21">21</td>
<td><input type="checkbox" name="n22">22</td>
<td><input type="checkbox" name="n23">23</td>
<td><input type="checkbox" name="n24">24</td>
<td><input type="checkbox" name="n25">25</td>
<td><input type="checkbox" name="n26">26</td>
<td><input type="checkbox" name="n27">27</td>
<td><input type="checkbox" name="n28">28</td>
<td><input type="checkbox" name="n29">29</td>
<td><input type="checkbox" name="n30">30</td>
</tr>
<tr>
<td><input type="checkbox" name="n31">31</td>
<td><input type="checkbox" name="n32">32</td>
<td><input type="checkbox" name="n33">33</td>
<td><input type="checkbox" name="n34">34</td>
<td><input type="checkbox" name="n35">35</td>
<td><input type="checkbox" name="n36">36</td>
<td><input type="checkbox" name="n37">37</td>
<td><input type="checkbox" name="n38">38</td>
<td><input type="checkbox" name="n39">39</td>
<td><input type="checkbox" name="n40">40</td>
</tr>
<tr>
<td><input type="checkbox" name="n41">41</td>
<td><input type="checkbox" name="n42">42</td>
<td><input type="checkbox" name="n43">43</td>
<td><input type="checkbox" name="n44">44</td>
<td><input type="checkbox" name="n45">45</td>
<td><input type="checkbox" name="n46">46</td>
<td><input type="checkbox" name="n47">47</td>
<td><input type="checkbox" name="n48">48</td>
<td><input type="checkbox" name="n49">49</td>
</tr>
</table>

<p>Número de serie:
<input type="number" name="serie" min="1" max="999" required>
</p>

<input type="submit" name="jugar" value="Jugar">

</form>

<?php if (isset($_POST["jugar"])) { ?>

<h2>Combinación ganadora</h2>

<table border="1" cellpadding="10">
<tr>
<td><?php echo $g1; ?></td>
<td><?php echo $g2; ?></td>
<td><?php echo $g3; ?></td>
<td><?php echo $g4; ?></td>
<td><?php echo $g5; ?></td>
<td><?php echo $g6; ?></td>
</tr>
</table>

<p>Serie ganadora: <?php echo $serieGanadora; ?></p>
<p>Aciertos: <?php echo $aciertos; ?></p>
<p>Dinero ganado: <?php echo $premio; ?> euros</p>

<?php } ?>

</body>
</html>
