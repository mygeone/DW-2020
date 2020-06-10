<?php
include_once("header.php");
#print("Empleado: ");
#print($_SESSION['idEmpleado']);

require '../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$orders = $client->tienda->ordenes->find();
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="display-4">Sales report</div>
        </div>
    </div>
    <div class="row mt-3">
        <div style="padding-right: 15px" class="col-4">ID Order</div>
        <div style="padding-left: 25px" class="col-5">Products</div>
        <div style="padding-left: 40px" class="col-1">Quantity</div>
        <div style="padding-left: 75px" class="col-2">Price</div>
    </div>
        <?php
        foreach($orders as $key => $order){
            echo'
            <div class="row shadow p-3 mb-5 bg-white rounded">
                <div class="col-4 p-0">'.$order['_id'].'</div>
                <div class="col-8 p-0">
                    <ul class="list-group list-group-flush">';
                    foreach($order['productos'] as $id_producto => $cantidadProductos){
                    $product = $client->tienda->productos->findOne(['_id' =>new  MongoDB\BSON\ObjectID($id_producto)]);
                    $pricePerProduct = $client->tienda->ordenes->findOne(['_id' =>new  MongoDB\BSON\ObjectID($order['_id'])]);
                    echo' 
                        <div class="row">
                            <div class="col-8 d-flex"><li class="list-group-item justify-items-center border-0">'.$product['name'].'</li></div>
                            <div class="col-2 d-flex align-items-center">'.$cantidadProductos.'</div>
                            <div class="col-2 d-flex align-items-center">'.$pricePerProduct['pricePaid'][$id_producto]*$cantidadProductos.'</div>

                        </div>
                        ';
                    };
                    echo'
                    </ul>
                    <div class="container-fluid d-flex justify-content-end align-items-end p-0 mt-3"><span class="badge badge-dark">Total Paid: $'.$order['total'].'</span></div>
                </div>

            </div>';
        }
        #<div class="col-6">PRODUCTOS</div>
        #<div class="col-4 bg-dark justify-self-end">'.$order['total'].'</div>
        #<div class="col-3">TOTAL</div>
         #'<div class="col-3">'.$order['total'].'</div>
        ?>
</div> 

<?php include_once("footer.php") ?>