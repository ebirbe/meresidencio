<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php if($sesion_usuario){?>
	
	<h2><strong>Hola <?php echo $sesion_usuario->nombre." ".$sesion_usuario->apellido?></strong></h2>
	<p>Tu sesi&oacute;n como usuario registrado est&aacute; iniciada.
	Ahora podr&aacute;s ofertar las residencias que sean de tu
	inter&eacute;s o publicar anuncios gratuitos en nuestra p&aacute;gina web.</p>
	<ul>
		<li><a href='<?php echo url::site("usuario/cerrar_sesion")?>'>Cerrar Sesi&oacute;n</a></li>
	</ul>
	<br/>
	
<?php }else{?>

	<?php echo form::open(url::site("usuario/iniciar_sesion")) ?>
	<h2><strong>Inicio de Sesi&oacute;n</strong></h2>
	<p>
		<?php echo form::label('usuario', 'Usuario:')?>
		<?php echo form::input(array('class'=>'textbox-lateral', 'name' => 'login'))?>
		<?php echo form::label('clave', 'Contrase&ntilde;a:')?>
		<?php echo form::password(array('class'=>'textbox-lateral', 'name' => 'clave'))?>
		<?php echo form::submit(array('class'=>'button', 'name' => 'sibmit'), 'Entrar') ?>
		<a href='<?php echo url::site("usuario/suscribir")?>'>Registrarme</a>
		<br/>
		
	</p>
	<?php echo form::close() ?>
	
<?php }?>
<div class="clear"></div>
