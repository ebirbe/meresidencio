<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h2>Publicaciones Aleatorias</h2>
<?php foreach ($publicaciones as $publ){
	
	$url = url::site('publicacion/detalles/'.$publ->id);

	?>
	<div class="portfolio-entry">
		<?php if($publ->imagenes[0] == NULL){?>
			<?php
			$img = html_Core::image('media/img/no_img.gif', array('class'=>'img-left'), FALSE);
			?>
			<a href="<?php echo $url ?>"><?php echo $img ?></a>
		<?php }else{ ?>
			<?php
			$img = html_Core::image('imagen/mostrar/'.$publ->imagenes[0], array('class'=>'img-left'), TRUE);
			?>
			<a href="<?php echo $url ?>"><?php echo $img ?></a>
		<?php } ?>
		<h3><?php echo $publ->zona->nombre ?> - <?php echo $publ->zona->ciudad->nombre ?></h3>
		
		<p>This is the description of the portfolio item. This is the
		description of the portfolio item. This is the description of the
		portfolio item. This is the description of the portfolio item. This is
		the description of the portfolio item. This is the description of the
		portfolio item.</p>
	</div>
<?php }?>
<div class="clear"></div>
