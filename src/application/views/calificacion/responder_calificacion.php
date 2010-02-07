<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo $vista_ya_califico; ?>
<?php if ($responder){?>
<?php echo form::open()?>
<table>
	<tr>
		<th>&iquest;C&oacute;mo respondes a esta calificaci&oacute;n de tu
		cliente?</th>
	</tr>
	<tr>
		<td><?php echo form_Core::textarea(array('name'=>'respuesta','cols'=>'60','rows'=>'3'), $formulario['respuesta']); ?></td>
		<td><?php echo $errores['respuesta']?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form_Core::submit(NULL,"Calificar") ?></td>
	</tr>
</table>
<?php echo form::close(); ?>
<?php }?>