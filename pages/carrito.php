<?php
include_once("header.php");
require '../vendor/autoload.php';
$uri = 'mongodb://localhost';
$client=new MongoDB\Client($uri);
//print_r($_SESSION['carrito']);

if(isset($_GET['remover'])){
    $toRemove = $_GET['remover'];
    unset($_SESSION['carrito'][$toRemove]);
}

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = array();
}

?>

<div class="container mt-5 pt-5">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    <?php
     $total=0;
    foreach($_SESSION['carrito'] as $prod => $cantidad){
    $product = $client->tienda->productos->findOne(['_id' =>new  MongoDB\BSON\ObjectID($prod)]);?>
    <tr>
        <th scope="row">
            <?php echo $product['name'];?>
            <td><?php echo $cantidad;?></td>
            <td><?php echo $product['price'];?></td>
            <td><?php echo $product['price']*$cantidad;?></td>
            <td>
                <a href="/carrito.php?remover=<?php echo $prod; ?>">
                <svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                </svg></a>
            </td>
        </th>
    </tr>
  
   <?php $total = $total + $product['price']*$cantidad;}?>
    
    </tbody>
</table>
</div>

<form action="pagar.php" method="POST">
    <div class="form-group">
        <div class="container">Total a pagar: <?php echo $total;?>
            <input type="hidden" name="total" value='<?php echo $total;?>'>
            <button type="submit" class="btn btn-primary">Pagar</button>
        </div>
    </div> 
    <?php
    $_SESSION['compra'] = array();
    #printr_r($_SESSION['carrito']);
    foreach($_SESSION['carrito'] as $prod => $cantidad){
    $product = $client->tienda->productos->findOne(['_id' =>new  MongoDB\BSON\ObjectID($prod)]);
        $_SESSION['compra'][$prod]=$product['price'];
    }
    ?>
</form>

 
<?php
include_once("footer.php")
?>



