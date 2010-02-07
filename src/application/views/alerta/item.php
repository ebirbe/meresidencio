<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
	<tr class="item_alertas">
		<td class="columna_titulos" rowspan="2">
			<?php
			if($fila->estado->nombre)	echo "&gt;&gt; {$fila->estado->nombre}";
			else  						echo "-";
			?>
		</td>
		<td class="columna_titulos" rowspan="2"> 
			<?php
			if($fila->ciudad->nombre)	echo "&gt;&gt; {$fila->ciudad->nombre}";
			else  						echo "-";
			?>
		</td>
		<td class="columna_titulos" rowspan="2">
			<?php
			if($fila->zona->nombre)	echo "&gt;&gt; {$fila->zona->nombre}";
			else  						echo "-";
			?>
		</td>
		<td class="columna_titulos" rowspan="2">
			<?php
			if($fila->tipoinmueble->nombre)	echo "&gt;&gt; {$fila->tipoinmueble->nombre}";
			else  						echo "-";
			?>
		</td>
		<td class="columna_titulos"><?php echo html::anchor('alerta/consultar/'.$fila->id, 'Consultar') ?></td>
	</tr>
	<tr>
		<td class="columna_titulos"><?php echo html::anchor('alerta/eliminar/'.$fila->id, 'Eliminar') ?></td>
	</tr>