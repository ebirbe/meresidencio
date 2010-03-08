<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<h2>Estado <?php echo $nombreEstado ?></h2>
<?php echo form::open(NULL, array('method'=>'POST')) ?>
<table class="tabla_ext">
	<tr>
		<th colspan="4"><?php echo $mensaje ?></th>
	</tr>
	<tr>
		<td><?php echo form::label('ciudad','Ciudad:') ?></td>
		<td><?php echo form::input('ciudad',$formulario['ciudad']) ?></td>
		<td><?php echo $errores['ciudad'] ?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form::submit(array("class"=>"button"),'Guardar') ?></td>
	</tr>
</table>
<?php echo form::close() ?>
<?php 
$lista = new View('ciudad/lista');
$lista->ciudad = $ciudad;
$lista->estado_id = $estado_id;
echo $lista;
?>
