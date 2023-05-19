<?php require('sec.php') ?>
<?php
@session_start();
$_SESSION['usuario'] = false;
unset($_SESSION['usuario']);
session_destroy();
header("location:..\publico\index.php");
