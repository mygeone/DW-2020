<?php 
include_once("header.php");
$prod=$_GET['key'];
$product = $client->tienda->productos->findOne(['_id' =>new  MongoDB\BSON\ObjectID($prod)]);
$img = $client->tienda->img->findOne(['prod' => $prod]);
?>
 

<div class="container my-5">
    <div class="row justify-content-center my-5">
        <div class="col-6"><div class="display-1"><?php echo $product['name'] ?></div></div></div>
    
    <div class="row">
        <div class="col-6"><img style="height: 20vw" src="<?php echo $img['img'] ?>" class="figure-img img-fluid rounded" alt="..."> </div>
        <div class="col-6">
            <div class="col-12 display-5 align-self-start"><?php echo  $product['desc']?></div>
            <div class="col-12 align-self-end lead">Price: <?php echo $product['price']?></div>
            <div class="col-6 align-self-end lead">

                <form action="agregar.php" method="POST">
                   <!-- <div class="form-group">
                         <label for="exampleInputPassword1">Agregar al carrito: </label>
                         <input type="number" class="form-control" placeholder="Cantidad" value=1 />
                         <button type="submit" class="btn btn-primary">Agregar</button>
                    </div> -->
                    <input type="number" name="cantidad" value="1"/>
                    <input type="submit" value="Agregar al carrito" />
                    <input type="hidden" name="producto" value="<?php echo $prod; ?>"/>

                </form>
            
            </div>

        </div>
    </div>

</div>


<?php include_once("footer.php"); ?>