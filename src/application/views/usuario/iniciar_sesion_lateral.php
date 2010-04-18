<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php if(is_a($sesion_usuario, 'Usuario_Model') && $sesion_usuario->id > 0){?>

<h2>Hola <?php echo $sesion_usuario->login?></h2>
<?php if($sesion_usuario->tipo == USUARIO_ADMIN){?>
<p>Usted est&aacute; usando su sesi&oacute;n de <em>Administrador</em>.</p>
<?php }else{?>
<p>Tu sesi&oacute;n como <em>usuario registrado</em> est&aacute;
iniciada.</p>
<?php }?>
<ul>
	<li><a href='<?php echo url::site("usuario/cerrar_sesion")?>'><?php echo html_Core::image('media/img/iconos/door_out.png', array('class'=>'icono'))?>Cerrar
	Sesi&oacute;n</a></li>
</ul>
<br/>
<?php }else{?>
<?php echo form::open(url::site("usuario/iniciar_sesion")) ?>
<h2>Inicia tu Sesi&oacute;n</h2>
<p><a href='<?php echo url::site("usuario/suscribir")?>'><?php echo html_Core::image('media/img/iconos/user_add.png', array('class'=>'icono', 'alt'=>'Registrate'))?>Registrate</a>
<br/>
<a href='<?php echo url::site('usuario/recuperar')?>'><?php echo html_Core::image('media/img/iconos/key_delete.png', array('class'=>'icono', 'alt'=>'Recuperar Contrase&ntilde;a'))?>Recuperar
 Contrase&ntilde;a</a></p>
<p><?php echo form::label('login_lat', 'Usuario:')?> <?php echo form::input(array('class'=>'textbox-lateral', 'name' => 'login','id' => 'login_lat'))?>
<?php echo form::label('clave_lat', 'Contrase&ntilde;a:')?> <?php echo form::password(array('class'=>'textbox-lateral', 'name' => 'clave','id' => 'clave_lat'))?>
<?php echo form::submit(array('class'=>'button', 'name' => 'sibmit'), 'Entrar') ?>
</p>
<?php echo form::close(); ?>

<?php }?>
<div class="clear"></div>
