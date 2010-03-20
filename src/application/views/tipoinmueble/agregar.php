<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<h2>Agregar Tipo de Inmueble</h2>
<?php echo form::open() ?>
<table class="tabla_ext">
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('tipoinmueble','Tipo de Inmueble') ?></td>
		<td><?php echo form::input('tipoinmueble',$formulario['tipoinmueble']) ?></td>
		<td><?php echo $errores['tipoinmueble'] ?></td>
	</tr>
	<tr>
		<td colspan="2"><?php echo form::submit(array('class'=>'button'),'Guardar') ?></td>
		<?php if(isset($editar)){?>
		<td><input type="button"
			OnClick="window.location.href='<?php echo url::site('tipoinmueble/agregar/') ?>'"
			class="button" value="Finalizar" /></td>
			<?php }?>
	</tr>
</table>
<?php echo form::close() ?>
<?php 
$lista = new View('tipoinmueble/lista');
$lista->tipo_in = ORM::factory('tipoinmueble')->find_all();
echo $lista;
?>