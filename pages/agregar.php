<?php 
session_start();

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = Array();
}

if($_POST['cantidad']<0){
    die("fucking hacker");
}
if(isset($_SESSION['carrito'][$_POST['producto']])){
    $_SESSION['carrito'][$_POST['producto']] += $_POST['cantidad'];
}else{

    $_SESSION['carrito'][$_POST['producto']] = $_POST['cantidad'];
}
header("Location: /pages/carrito.php");


?>