<?php
include_once("header2.php");
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

$cat=$_GET['key'];
$collection = $client->tienda->productos->find(['categoria' => $cat]);
$prods = array();
foreach ($collection as $entry) {
        $prods[$entry['_id']->__toString() ] = $entry['name'];
}
?>
<?php
$aux = count($prods);
?>
<div class="container my-5 py-5">
<?php
foreach($prods as $key => $value){
$producto = $client->tienda->productos->findOne(['_id' =>new  MongoDB\BSON\ObjectID($key)]);
if($aux%2 == 0){ ?>
        <div class="container py-3">
            <div class="row justify-content-around my-3">
                <figure class="col-6 figure my-3 row justify-content-center">
		<img style="height: 20vw" src="imagenes/<?php echo $producto['name'] ?>.jpeg" class="figure-img img-fluid rounded" alt="...">
                </figure>
                <div class="col-6 row justify-content-around">
                    <div class="col row align-items-center">
                        <div class="col display-3"><?php echo $producto['name'] ?></div>
			<div class="col-12 display-5"><?php echo  $producto['desc']?></div>
			<p class="col-12 lead">Price: <?php echo $producto['price']?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php $aux = $aux-1; } else {?>

        <div class="container">
            <div class="row justify-content-around my-3">
                <div class="col-6 row justify-content-around">
                    <div class="col row align-items-center">
			<div class="col display-3"><?php echo $producto['name'] ?></div>
                        <div class="col-12 display-5"><?php echo  $producto['desc']?></div>
                        <p class="col-12 lead">Price: <?php echo $producto['price']?></p>   
		 </div>
                </div>

                <figure class="col-6 figure my-3 row justify-content-center">
                    <img style="height: 20vw" src="imagenes/<?php echo $producto['name'] ?>.jpeg" class="figure-img img-fluid rounded" alt="...">
                </figure>

            </div>
        </div>
        <?php $aux = $aux-1; ?>

    <?php }};?>
</div>
<?php include_once("footer2.php");?>
