<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>

<p>
    <?php if (is_a($sesion_usuario, 'Usuario_Model') && $sesion_usuario->id > 0){ ?>
	Hola <strong><?php echo $sesion_usuario->login ?></strong>
    <?php if ($sesion_usuario->tipo == USUARIO_ADMIN) { ?>
	    Usted est&aacute; usando su sesi&oacute;n de <em>Administrador</em>.
    <?php } else { ?>
	    Tu sesi&oacute;n como <em>usuario registrado</em> est&aacute; iniciada.
    <?php } ?>

    <a href='<?php echo url::site("usuario/cerrar_sesion") ?>'><?php echo html_Core::image('media/img/iconos/door_out.png', array('class' => 'icono')) ?>Cerrar Sesi&oacute;n</a>
</p>
<br/>
<?php
	}
	else
	{
?>
<?php echo form::open(url::site("usuario/iniciar_sesion")) ?>
    <?php echo form::label('login_lat', 'Usuario:') ?> <?php echo form::input(array('class' => 'textbox-lateral', 'name' => 'login', 'id' => 'login_lat')) ?>
    <?php echo form::label('clave_lat', 'Contrase&ntilde;a:') ?> <?php echo form::password(array('class' => 'textbox-lateral', 'name' => 'clave', 'id' => 'clave_lat')) ?>
    <?php echo form::submit(array('class' => 'button', 'name' => 'sibmit'), 'Entrar') ?>
    <a href='<?php echo url::site("usuario/suscribir") ?>'><?php echo html_Core::image('media/img/iconos/user_add.png', array('class' => 'icono', 'alt' => 'Registrate')) ?>Registrate</a>
    <a href='<?php echo url::site('usuario/recuperar') ?>'><?php echo html_Core::image('media/img/iconos/key_delete.png', array('class' => 'icono', 'alt' => 'Recuperar Contrase&ntilde;a')) ?>Recuperar Contrase&ntilde;a</a>
<?php echo form::close(); ?>

<?php } ?>
<div class="clear"></div>
