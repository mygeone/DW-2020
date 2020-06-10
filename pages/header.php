<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/8b41999ee2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/style22.css">
  <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

</head>
<?php

require '/var/www/html/vendor/autoload.php';
$uri = 'mongodb://localhost';
$client=new MongoDB\Client($uri);
$collection = $client->tienda->categorias->find();
$categorias = array();
foreach($collection as $entry){
  $categorias[$entry['_id']->__toString()] = $entry['name'];
}
?>

<body>
<header>
<nav class="navbar fixed-top navbar-expand-lg navbar-light">
  <!-- Home -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Barra responsiva -->
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <!-- items barra -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a style="color: #A28E8A" class="navbar-brand" href="/index.php">Siam Diaz</a></li>
      <li class="nav-item"><a style="color: #A28E8A;" class="nav-link" href="/pages/informaciones.php">About</a></li>
      <li class="nav-item dropdown">
        <a style="color: #A28E8A" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php foreach($categorias as $key => $value){?>
	            <a class="dropdown-item" href="/pages/cat.php?key=<?php echo $key?>"><?php echo $value?></a>
            <?php } ?>
          </div>
      </li>
    </ul>
    <ul class="navbar-nav">
      <div class="d-flex justify-content-end">
      <!-- Ingresar -->
      <li class="nav-item">
        <div class="d-lg-flex flex-column">
            <!-- icon ingreasr -->
            <div class="d-lg-flex justify-content-center">  
              <svg class="bi bi-person-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </div>
          <!-- texto ingresar -->
          <div class="d-lg-flex justify-content-center">   
              <!--
              #if(isset($_SESSION['usuario'])){
              #echo '<a style="color: black;" class="nav-link" href="/cuenta.php">Mi cuenta </a>';
              #}else{
              #echo '<a style="color: black;" class="nav-link" href="/loginCliente.php">Ingresar</a>';
              #}
              -->
              <a style="color: black;" class="nav-link" href="/pages/loginVendedor.php">Vendedor</a>
          </div>
        </div>
      </li>
      <!-- Carrito -->
      <li class="nav-item">
        <div class="d-flex flex-column">
        <!-- icon carrito -->
          <div class="d-lg-flex justify-content-center">
            <svg class="bi bi-cart-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
            </svg>
          </div>
          <!-- texto carrito-->
          <div class="d-lg-flex justify-content-center"> 
            <a style="color: black;" class="nav-link" href="/pages/carrito.php">Carrito </a>
          </div>
        </div>
      </li>
      </div>
      
    </ul>
  </div>
</nav>
</header>
