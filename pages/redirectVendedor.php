<?php
session_start();


#user: $_POST['usuario']
#pw: $_POST['pwd']


#consulta BDD
require '../vendor/autoload.php';
$uri = 'mongodb://localhost';
$client=new MongoDB\Client($uri);

$verifyUser = $client->tienda->vendedores->countDocuments([
    'user' => $_POST['usuario'],
    'password' => $_POST['pwd']
]);

if($verifyUser == 1){
    echo "Login Exitoso. Redireccionando...";
    sleep(3);
    header("Location: /pages/empleados.php");
} else { 
    echo "Contraseña invalida";
}
$_SESSION['idEmpleado'] = $_POST['usuario']

?>
