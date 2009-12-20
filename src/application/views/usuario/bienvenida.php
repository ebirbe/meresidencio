<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<p>Felicitaciones <?php echo $nombre ?> <?php echo $apellido ?>! Has registrado con exito el usuario <?php echo $login ?>.</p>
<p>Te invitamos a <?php echo html_Core::anchor('usuario/editar','Completar tus Datos')?> y a que comiences a <?php echo html_Core::anchor('/','Disfrutar del Servicio')?></p>