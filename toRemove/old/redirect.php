<?php

session_start();

$_SESSION['usuario'] = $_POST['usuario'];
header("Location: /");



?>