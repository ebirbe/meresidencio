<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<?php 
switch ($uso){
	case "solicitud":
		$url = url::site('publicacion/ofertar/'.$publ->id);
		break;
	default:
		$url = url::site('publicacion/detalles/'.$publ->id);
		break;
}
if($publ->imagenes[0] == NULL){
	$img = html_Core::image('media/img/no_img.gif', array('class'=>'img-left'), FALSE);
}else{
	$img = html_Core::image('imagen/mostrar/'.$publ->imagenes[0], array('class'=>'img-left'), TRUE);
}
?>
<div class="portfolio-entry">
	<a href="<?php echo $url ?>"><?php echo $img ?></a>
	<h3><a href="<?php echo $url ?>"><?php echo $publ->zona->nombre ?> - <?php echo $publ->zona->ciudad->nombre ?></a></h3>
	
	<ul>
		<li>Estado: <strong><?php echo $publ->zona->ciudad->estado->nombre ?></strong></li>
		<li>Sexo: <strong><?php echo $publ->sexo ?></strong></li>
		<li>Precio: <strong><?php echo $publ->precio ?> Bs.</strong></li>
	</ul>
	<p>
	<?php
	echo trim(substr($publ->descripcion, 0, 70));
	if(strlen($publ->descripcion) > 70) echo "... (Contin&uacute;a.)";
	?>
	</p>
	<a href='<?php echo $url?>' class="img-right">Ver m&aacute;s...</a>
</div>
