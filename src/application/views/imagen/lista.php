<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
$publicacion = "";
$borrar = "";
?>
<?php if ($imagenes->count() > 0){ ?>
<table class="tabla_ext">
	<tr>
	<?php
	$i = 0;
	foreach($imagenes as $imagen){
		if($i++ % 3 == 0) echo "</tr><tr>";
			
		if(isset($admin)){
			$publicacion = html::anchor(url::site('publicacion/detalles/'.$imagen->publicacion_id), 'Ver');
			$borrar = html::anchor(url::site('imagen/eliminar/'.$imagen->id), 'Borrar');
		}
		?>
		<td><a class="lightbox"
			href='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>'><img
			class="img-center"
			src='<?php echo url::site('imagen/mostrar').'/'.$imagen ?>' /></a>
			<div align="center">
				<?php if(isset($admin))echo $publicacion." | ".$borrar?>
			</div>
		</td>
			<?php } ?>
	</tr>
</table>
			<?php }?>
<div class="clear"></div>
