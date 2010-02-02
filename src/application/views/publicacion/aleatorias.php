<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h2>Publicaciones Aleatorias</h2>
<?php foreach ($publicaciones as $publ){
		$pub_item = new View('publicacion/item');
		$pub_item->publ = $publ;
		echo $pub_item;
 }?>
<div class="clear"></div>
