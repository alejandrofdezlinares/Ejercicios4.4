<?php
    
session_start();

$_SESSION = [];
session_destroy();

header("Location: Ejercicio1.php");
exit;
