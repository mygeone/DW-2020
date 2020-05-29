<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://kit.fontawesome.com/8b41999ee2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style22.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
</head>


<?php
error_reporting(E_ALL);
ini_set("display_errors","1");
require 'vendor/autoload.php';
$uri = 'mongodb://localhost';
$client=new MongoDB\Client($uri);
$collection = $client->tienda->categorias->find();
$categorias = array();
foreach($collection as $entry){
  $categorias[$entry['_id']->__toString()] = $entry['name'];
}
?>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-light">
  <a style="color: #A28E8A" class="navbar-brand" href="index.php"><div class="display-5">Siam Diaz</div></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a style="color: #A28E8A;" class="nav-link" href="/informaciones.php">About</a>
      </li>
      <li class="nav-item dropdown">
        <a style="color: #A28E8A" class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Menu</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php foreach($categorias as $key => $value){?>
	 <a class="dropdown-item" href="cat.php?key=<?php echo $key?>"><?php echo $value?></a>
          <?php } ?>
        </div>
      </li>
    </ul>
  </div>
</nav>
