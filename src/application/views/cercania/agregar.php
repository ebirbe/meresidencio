<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<h2>Agregar Cercania</h2>
<?php echo form::open() ?>
<table class="tabla_ext">
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('cercania','Cercania:') ?></td>
		<td><?php echo form::input('cercania',$formulario['cercania']) ?></td>
		<td><?php echo $errores['cercania'] ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form::submit(array('class'=>'button'),'Guardar') ?></td>
		<?php if(isset($editar)){?>
		<td><input type="button"
			OnClick="window.location.href='<?php echo url::site('cercania/agregar/') ?>'"
			class="button" value="Finalizar" /></td>
			<?php }?>
	</tr>
</table>
<?php echo form::close() ?>
<?php 
$lista = new View('cercania/lista');
$lista->cercania = ORM::factory('cercania')->find_all();
echo $lista;
?>
