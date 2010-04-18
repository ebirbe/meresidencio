<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<?php
$fecha = split("-",$publ->fecha);
?>
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
	$img = html_Core::image('media/img/no_img.png', array('class'=>'img-right', 'alt'=>'Sin Foto'), FALSE);
}else{
	$imagen = new Imagen_Model($publ->imagenes[0]->id);
	$img = "<img src='".url::base().$imagen->img_p."' class='img-right' alt='Foto de Residencia' />";
}
?>
<div class="portfolio-entry">
	<a href="<?php echo $url ?>"><?php echo $img ?></a>
	<h3><a href="<?php echo $url ?>"><span class="titulo_pub"><?php echo $publ->tipoinmueble->nombre ?> en <?php echo $publ->zona->nombre ?> - <?php echo $publ->zona->ciudad->nombre ?> - <?php echo $publ->zona->ciudad->estado->nombre ?></span></a></h3>
		<p>
			<strong><?php echo $publ->sexo ?></strong> -
			<strong><?php echo $publ->precio ?> Bs.</strong> - 
			(<?php echo $fecha[2]."-".$fecha[1]."-".$fecha[0]; ?>)
			<br/>
				<?php
				if ($publ->descripcion=='') /*echo '&nbsp;'*/;
				echo trim(substr($publ->descripcion, 0, 70));
				if(strlen($publ->descripcion) > 70) echo "... (Contin&uacute;a.)";
				?>
		</p>
		<!--
		<a href='<?php echo $url?>' class="img-left"><?php echo html_Core::image('media/img/iconos/add.png', array('class'=>'icono', 'alt'=>'Ver Detalles'))?>Ver m&aacute;s...</a>
		 -->
</div>
