<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2><em><strong>Notificaciones</strong></em></h2>

<ul>
<?php if($notificaciones == array()){ ?>
	<li>No tienes notificaciones.</li>
	<?php }else{
		foreach ($notificaciones as $noti){
			echo "<li>$noti</li>";
		}
	}
	?>
</ul>
<div class="clear"></div>
