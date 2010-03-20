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
		<td colspan="2"><?php echo form::submit(array("class"=>"button"),'Guardar') ?></td>
		<?php if(isset($editar)){?>
		<td><input type="button"
			OnClick="window.location.href='<?php echo url::site('ciudad/agregar/'.$estado_id) ?>'"
			class="button" value="Finalizar" /></td>
			<?php }?>
	</tr>
</table>
<div align="right"><?php echo html_Core::anchor(url::site('estado/agregar/'), html_Core::image('media/img/iconos/arrow_left.png', array('class'=>'icono'))."Estados")?></div>
<?php echo form::close() ?>
<?php 
$lista = new View('ciudad/lista');
$lista->ciudad = ORM::factory('ciudad')->where('estado_id', $estado_id)->find_all();
$lista->estado_id = $estado_id;
echo $lista;
?>
