<?php
include_once("header.php");
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

$collection = $client->tienda->categorias->find();
$categorias=array();
foreach ($collection as $entry){
	$categorias[$entry['_id']->__toString() ] = $entry['name'];
}


?>
<h3>Caterogias</h3>
<ul>
<?php
foreach($categorias as $key => $cat){
?>

<li><a href="cat.php?key=<?php echo $key?>"><?php echo $cat?></a></li>
<?php
}
?>

</ul>

<?php
include_once("footer.php");
?>
