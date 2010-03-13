<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<h2>Ciudad <?php echo $nombreCiudad ?></h2>
<?php echo form::open(NULL, array('method'=>'POST')) ?>
<table class="tabla_ext">
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('zona','Zona:') ?></td>
		<td><?php echo form::input('zona',$formulario['zona']) ?></td>
		<td><?php echo $errores['zona'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(array("class"=>"button"),'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<?php 
$lista = new View('zona/lista');
$lista->zona = ORM::factory('zona')->where('ciudad_id', $ciudad_id)->find_all();
$lista->ciudad_id = $ciudad_id;
echo $lista;
?>
