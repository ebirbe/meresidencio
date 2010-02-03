<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2><strong>Notificaciones</strong></h2>
<br />
<ul>
<?php
if($notificaciones != array()){
	foreach ($notificaciones as $notif){
		echo "<li>$notif</li>";
	}
}else{
	echo "<li>No tienes ning&uacute;na notificaci&oacute;n.</li>";
}
?>
</ul>
<br />
<div class="clear"></div>