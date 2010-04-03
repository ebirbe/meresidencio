<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
$publicacion = "";
$borrar = "";
?>

<table class="tabla_ext">
	<tr>
	<?php if ($imagenes->count() > 0){ ?>
	<?php
	$i = 0;
	foreach($imagenes as $imagen){
		if($i++ % 3 == 0 && $i!=1) echo "</tr><tr>";

		if(isset($admin) && $admin==TRUE){
			$publicacion = "<a href='".url::site('publicacion/detalles/'.$imagen->publicacion_id)."'>".html_Core::image('media/img/iconos/eye.png', array('class'=>'icono', 'alt'=>'Ver Publicacion'))."</a>";
		}elseif (isset($admin) && $admin==FALSE){
			$publicacion = "<a href='".url::site('imagen/eliminar').'/'.$imagen->id."'>".html_Core::image('media/img/iconos/cancel.png', array('class'=>'icono', 'alt'=>'Borrar Imagen'))."</a>";
		}
		?>
		<td><a class="lightbox"
			href='<?php echo url::base().$imagen->img_g ?>'><img
			class="img-center"
			src='<?php echo url::base().$imagen->img_p ?>' alt="Foto de la Residencia" /></a>
		<div class="center">
			<?php if(isset($admin))echo $publicacion?>
		</div>
		</td>
		<?php } ?>
		<?php }else{?>
		<td align="center"><?php echo html_Core::image('media/img/no_img.gif', 'Sin Foto')?></td>
		<?php }?>
	</tr>
</table>
<div class="clear"></div>
