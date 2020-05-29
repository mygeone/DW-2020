<?php
include_once("header.php");
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
        <a style="text-decoration: none;" href="/prod.php?key=<?php echo $producto['_id']?>">
        <div class="container py-3 no-underline">
            <div class="row justify-content-around my-3">
                <figure class="col-6 figure my-3 row justify-content-center">
		            <img style="height: 20vw" src="<?php echo $producto['img'] ?>" class="figure-img img-fluid rounded" alt="...">
                </figure>
                <div class="col-6 row justify-content-around">
                    <div class="col row align-items-center">
                        <div class="col display-3"><?php echo $producto['name'] ?></div>
                    </div>
                </div>
            </div>
        </div>
        </a>
        <?php $aux = $aux-1; } else {?>
            
        <a style="text-decoration: none;" href="/prod.php?key=<?php echo $producto['_id'] ?>">
        <div class="container">
            <div class="row justify-content-around my-3">
                <div class="col-6 row justify-content-around">
                    <div class="col row align-items-center">
			<div class="col display-3"><?php echo $producto['name'] ?></div>
		            </div>
                </div>

                <figure class="col-6 figure my-3 row justify-content-center">
                    <img style="height: 20vw" src="<?php echo $producto['img'] ?>" class="figure-img img-fluid rounded" alt="...">
                </figure>

            </div>
        </div>
        </a>

        <?php $aux = $aux-1; ?>

    <?php }};?>
</div>
<?php include_once("footer.php");?>
