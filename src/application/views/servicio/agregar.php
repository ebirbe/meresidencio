<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<h2>Agregar Comodidades</h2>
<?php echo form::open() ?>
<table class="tabla_ext">
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('servicio','Comodidad:') ?></td>
		<td><?php echo form::input('servicio',$formulario['servicio']) ?></td>
		<td><?php echo $errores['servicio'] ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form::submit(array('class'=>'button'),'Guardar') ?></td>
		<?php if(isset($editar)){?>
		<td><input type="button"
			OnClick="window.location.href='<?php echo url::site('servicio/agregar/') ?>'"
			class="button" value="Finalizar" /></td>
			<?php }?>
	</tr>
</table>
<?php echo form::close() ?>
<?php 
$lista = new View('servicio/lista');
$lista->servicio = ORM::factory('servicio')->find_all();
echo $lista;
?>