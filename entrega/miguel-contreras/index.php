<?php
error_reporting(E_ALL);
ini_set("display_errors","1");
include("header.php");
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

<!-- Menu Cards --> 
<div class="display-1 row justify-content-center py-5 my-5">Menu</div>
<div class="row justify-content-around my-5">
<?php
foreach($categorias as $key => $cat){
$categoria = $client->tienda->categorias->findOne(['_id' =>new  MongoDB\BSON\ObjectID($key)]);
?>
    <div class="card border-0" style="width: 25rem;">
		<div class="display-4"><?php echo $cat ?></div>
		  <a href="cat.php?key=<?php echo $key?>">
		<img style="margin-bot: 100px;" class="card-img-top" src="<?php echo $categoria['img'] ?>" alt="Card image cap">
    	</a>
	<div class="card-body">
    </div>
  </div>
<?php } ?> 
</div>
</div>
<!--/menu cards -->

<?php include_once("footer.php");?>
