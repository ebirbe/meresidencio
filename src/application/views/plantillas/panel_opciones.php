<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
	<h2><strong>Opciones:</strong></h2>
	<br/>
	<ul>
		<?php foreach ($links as $link){?>
		<li><a href='<?php echo $link[0]?>'><?php echo $link[1]?></a></li>
		<?php }?>
	</ul>
	<br/>
<div class="clear"></div>