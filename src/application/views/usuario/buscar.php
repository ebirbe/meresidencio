<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo form::open()?>
<table>
	<tr>
		<th colspan="2">Buscar Usuario</th>
	</tr>
	<tr>
		<td><?php echo form::input('buscar')?></td>
		<td><?php echo form::submit(array('class'=>'button'), 'Buscar') ?></td>
	</tr>
</table>
<?php echo form::close()?>

<h2>Lista de Usuarios</h2>
<br>
<table class="tabla_alertas">
	<tr align="left">
		<th>ID</th>
		<th>LOGIN</th>
		<th>NOMBRE</th>
		<th>APELLIDO</th>
		<th>CORREO</th>
		<th>OPCION</th>
	</tr>
	<?php foreach ($usuario as $fila) {
		$usr_item = new View('usuario/item');
		$usr_item->fila = $fila;
		echo  $usr_item;
	}?>
</table>
<br/>
<div class="clear"></div>