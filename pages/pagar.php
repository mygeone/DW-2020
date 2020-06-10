<?php
include_once("header.php");
require '../vendor/autoload.php';
session_start();
print_r($_POST);
$total=$_POST['total'];


if($total == 0){
    die("Carrito vacio");
}
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
#print_r($_SESSION['compra']);
#foreach($_SESSION['compra'] as $idProduct => $paidValue){
#    print_r($_SESSION['compra'][$paidValue]);
#}

$ordenes = $client->tienda->ordenes;
$ordenes->insertOne(array('total' => $total, 'productos' => $_SESSION['carrito'], 'pricePaid' => $_SESSION['compra']));
echo "Agregado a mongoDB";
unset($_SESSION['carrito']);
?> 