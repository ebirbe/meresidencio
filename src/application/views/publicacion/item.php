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
	$imagen = new Imagen_Model($publ->imagenes[0]->id);
	$img = "<img src='".url::base().$imagen->img_p."' class='img-left' />";
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
	if ($publ->descripcion=='') echo '&nbsp;';
	echo trim(substr($publ->descripcion, 0, 70));
	if(strlen($publ->descripcion) > 70) echo "... (Contin&uacute;a.)";
	?>
	</p>
	<a href='<?php echo $url?>' class="img-right"><?php echo html_Core::image('media/img/iconos/add.png', array('class'=>'icono'))?>Ver m&aacute;s...</a>
</div>
