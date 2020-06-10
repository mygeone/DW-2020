<?php
include_once("header.php");
$prod = $_GET['key'];

require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

$producto = $client->tienda->productos->findOne(['_id' =>new  MongoDB\BSON\ObjectID($prod)]);
 

$nombre = $producto['name'];
$desc = $producto['desc'];
?>
	<h3><?php echo $nombre?></h3>
	<b><i><?php echo $desc?></i></b>
<?php
include_once("footer.php");
?>
