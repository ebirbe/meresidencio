<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php
$imagen = ORM::factory('imagen', $id_img); 
?>
<table>
	<tr>
		<th>Im&aacute;genes de la Publicacion Nro. <?php echo $id_pub ?></th>
	</tr>
	<tr>
		<td colspan="2"><?php echo $paginacion ?></td>
	</tr>
	<tr>
		<td><img src='<?php echo url::base().$imagen->img_p ?>' /></td>
	</tr>
</table>