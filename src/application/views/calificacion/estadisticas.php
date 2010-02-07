<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php
$calificaciones = ORM::factory('calificacion')
->where('usuario_id', $usuario->id);

//Comienza a prepararse la Paginacion
$paginacion = new Pagination(
	array(
		'uri_segment' => 'pagina',
		'total_items' => $calificaciones->count_all(),
		'items_per_page' => ITEMS_POR_PAGINA,
		'style' => 'classic',
	)
);

$limit = ITEMS_POR_PAGINA;
$offset = $paginacion->sql_offset;

$calificaciones = $calificaciones
->where('usuario_id', $usuario->id)
->orderby('id', 'DESC')
->limit($limit)
->offset($offset)
->find_all();
?>
<h2>Estad&iacute;sticas</h2>
<br/>
<table>
	<tr>
		<th>Exitosas</th>
		<td align="right" width="100"><?php echo Calificacion_Model::contar_calificacion($usuario->id, CALIFICACION_EXITO); ?>pts</td>
		<td align="right" width="100"><?php echo Calificacion_Model::porcentaje_calificacion($usuario->id, CALIFICACION_EXITO); ?>%</td>
	</tr>
	<tr>
		<th>Nulas</th>
		<td align="right"><?php echo Calificacion_Model::contar_calificacion($usuario->id, CALIFICACION_NULA); ?>pts</td>
		<td align="right"><?php echo Calificacion_Model::porcentaje_calificacion($usuario->id, CALIFICACION_NULA); ?>%</td>
	</tr>
	<tr>
		<th>Fallidas</th>
		<td align="right"><?php echo Calificacion_Model::contar_calificacion($usuario->id, CALIFICACION_FALLIDA); ?>pts</td>
		<td align="right"><?php echo Calificacion_Model::porcentaje_calificacion($usuario->id, CALIFICACION_FALLIDA); ?>%</td>
	</tr>
	<tr>
		<th>Total</th>
		<td align="right"><?php echo Calificacion_Model::total_contar($usuario->id); ?>pts</td>
		<td align="right"><h3><?php echo Calificacion_Model::total_porcentaje($usuario->id); ?>%</h3></td>
	</tr>
</table>
<br>
<h2>Lista de Calificaciones</h2>
<br/>

<?php echo $paginacion ?>
<table class="tabla_alertas">
	<tr>
		<th>Fecha</th>
		<th>Publicaci&oacute;n</th>
		<th>Cliente</th>
		<th>Calificaci&oacute;n</th>
	</tr>
	<?php foreach ($calificaciones as $fila){
	if($fila->respuesta==''){
		$link = html::anchor(url::site('calificacion/responder_calificacion/'.$fila->id), "Responder");
	}else{
		$link = html::anchor(url::site('calificacion/responder_calificacion/'.$fila->id), Calificacion_Model::$calif_lista[$fila->puntos]);
	}
	?>
	<tr align="center">
		<td><?php echo $fila->fecha ?></td>
		<td><?php echo html::anchor(url::site('publicacion/detalles/'.$fila->publicacion_id),"#$fila->publicacion_id")?></td>
		<td><?php echo ORM::factory('usuario', $fila->cliente_id)->login ?></td>
		<?php if($fila->puntos > 0){?>
			<td><?php echo $link ?></td>
		<?php }else{?>
			<td>Aun no han calificado.</td>
		<?php }//FIN IF?>
	</tr>
	<?php }//FIN FOREACH?>
</table>
<?php echo $paginacion ?>
