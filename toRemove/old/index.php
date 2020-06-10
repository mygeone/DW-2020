<?php
error_reporting(E_ALL);
ini_set("display_errors","1");
include("header2.php");
require 'vendor/autoload.php';
$uri = 'mongodb://localhost';
$client=new MongoDB\Client($uri);
$collection = $client->tienda->categorias->find();
$categorias = array();
foreach($collection as $entry){
  $categorias[$entry['_id']->__toString()] = $entry['name'];
}
?>
<div class="parallax vh-100 vw-100">
	<div class="container d-flex vh-100">
	<div class="row align-items-center">
		<div class="row justify-content-center">
				<div class="col-12 row justify-content-center"><div class="display-1 text-white">Siam Diaz</div></div>
				<div class="col-12 row justify-content-center"><div class="display-4 text-white">Classy. Tasty. Trendy.</div></div>
			</div>
		</div>
	</div>
</div>

<!-- about -->
<div class="container py-5" id="about">
  <div class="row justify-content-center mt-5 mb-5">
    <div class="col-6">
      <img style="height: 50vh; border-radius: 5%" src="imagenes/profile.jpeg" class="img-fluid" alt="Cinque Terre">     
    </div>
    <div class="col-6 row justify-content-center align-items-start">
      <div class="display-3">About</div>
      <div class="display-5">Nicolas Vargas is one part chef, one part barman. He had worked at most of prestigous hotels and ristorantes in Santiago. As a new classy chef face he opened his first ristorante in Barrio Italia. On this new  stage of Nicolas's career, he experiment with new flavours, ingredients and drinks. Be welcome to experiment with him on his first solo project: Siam Diaz.</div>
    </div>
  </div>
</div>

<!-- 2do parallax -->
<div class="parallax2 vh-100 vw-100">
</div>

<!-- Menu Cards --> 
<div class="display-1 row justify-content-center py-5 my-5">Menu</div>
<div class="row justify-content-around my-5">
<?php
foreach($categorias as $key => $cat){
?>
    <div class="card border-0" style="width: 25rem;">
		<div class="display-4"><?php echo $cat ?></div>
		  <a href="cat.php?key=<?php echo $key?>">
		<img style="margin-bot: 100px;" class="card-img-top" src="imagenes/<?php echo $cat?>.png" alt="Card image cap">
    	</a>
	<div class="card-body">
    </div>
  </div>
<?php } ?> 
<!--/menu cards -->
</div>
</div>
<!-- 3er parallax -->
<div class="parallax3 vh-100 vw-100"></div>

<!-- location -->
<div class="display-1 row justify-content-center py-4 my-4" id="location">Location</div>
<div class="container-fluid py-5">
	<div class="row justify-content-around">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1028.1402988380653!2d-70.66145893645165!3d-33.45242704039434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662c50687362dfb%3A0xae90bcb36667aa4!2sFacultad%20de%20Ingenier%C3%ADa%20y%20Ciencias%20Universidad%20Diego%20Portales!5e0!3m2!1ses!2scl!4v1589691413194!5m2!1ses!2scl" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	<div class="col-6 row justify-content-center">
		<div class="display-4">Av.Éjercito Libertador 441</div>
		<div class="display-4">Santiago, Chile</div>
		<div class="display-4">Mo-Fr / 08:30 - 21:00 </div>
	</div>
	</div>
</div>
<?php include_once("footer2.php");?>
