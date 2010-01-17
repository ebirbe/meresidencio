<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<table>
	<tr>
		<th>Im&aacute;genes de la Publicacion Nro. <?php echo $id_pub ?></th>
	</tr>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
	<tr>
		<td><img src='<?php echo url::site('imagen/mostrar').'/'.$id_img ?>' /></td>
	</tr>
</table>

<br>
		<?php echo html::anchor('publicacion', '<- Volver') ?>