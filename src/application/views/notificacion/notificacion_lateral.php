<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2><strong>Notificaciones</strong></h2>
<br />
<?php
if($notificaciones != array()){
	$i=0;
	foreach ($notificaciones as $notif){
		if($i++ == 5) break;
		echo "<li class='notificacion'>$notif</li>";
	}
}else{
	echo "<p>No tienes ning&uacute;na notificaci&oacute;n.</p>";
}
echo "<br /><div align='right'>".html::anchor('notificacion/mostrar', "Ver todas", array('align'=>'right'))."</div>";
?>
<br />
<div class="clear"></div>
