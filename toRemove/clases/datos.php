<?php
require 'vendor/autoload.php';
$uri = 'mongodb://localhost';
$client=new MongoDB\Client($uri);

$collection = $client->tienda->categorias;
$colleccategorias = ($collection->find());
$categorias = array();
foreach ($colleccategorias as $entry) {
	$categorias[ $entry['_id'] ->__toString() ] = $entry ['name'];
	echo $categorias[ $entry['_id'] ];
}
$catprod=array(0=>array(0,1,2),1 => array(3,4,5));

$productos = array("LOL", "FIFA20", ",CODMW","Sativa", "lirios", "rosas");
$descripciones = array("Juego que me cago la vida","Juego de futbol","juego de guerra","planta q vuela", "wea de las ranas", "rosas pero lindas"
);

?>

