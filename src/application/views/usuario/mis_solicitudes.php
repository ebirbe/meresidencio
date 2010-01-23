<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
	<tr>
		<th colspan="2">Mis Solicitudes</th>
	</tr>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
	<?php foreach ($publicacion as $fila) { ?>
			<?php if($fila->imagenes[0] == NULL){?>
				<tr>
					<td rowspan="5"><img width="72" height="72" src='<?php echo url::base(FALSE).'media/img/no_img.gif' ?>' /></td>
				</tr>
			<?php }else{ ?>
				<tr>
					<td rowspan="5"><img width="72" height="72" src='<?php echo url::site('imagen/mostrar').'/'.$fila->imagenes[0] ?>' alt='<?php echo url::site('publicacion/imagenes').'/'.$fila->imagenes[0] ?>' /></td>
				</tr>
				<?php } ?>
	<tr>
		<td><?php echo $fila->tipoinmueble->nombre; ?></td>
	</tr>
	<tr>
		<td><?php echo $fila->zona->ciudad->nombre; ?> - <?php echo $fila->zona->ciudad->estado->nombre; ?> - <?php echo $fila->zona->nombre; ?></td>
	</tr>
	<tr>
		<td><?php echo $fila->sexo; ?></td>
	</tr>
	<tr>
		<td><?php echo $fila->descripcion; ?> <a href='<?php echo url::site('publicacion/ofertar').'/'.$fila->id ?>'>m&aacute;s &gt;</a></td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
</table>

<br>
		<?php echo html::anchor('usuario', '<- Volver') ?>