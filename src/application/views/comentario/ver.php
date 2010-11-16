<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table class="tabla_ext">
    <tr>
	<td>
	    <a name="cmt<?php echo $comentario->id ?>"><?php echo $comentario->id ?></a> -
	    En <strong><?php echo $comentario->fecha ?></strong>,
	    <strong><?php echo $comentario->nombre ?></strong> dijo:
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo $comentario->contenido ?>
	</td>
    </tr>
</table>
