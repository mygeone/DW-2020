<?php
session_start();
$_SESSION['usuario'] = $_POST['usuario'];
header("Location: /");
print_r($_SESSION['usuario'])
?> 