<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php echo form::open() ?>
<h2>Iniciar Sesi&oacute;n</h2>

<table width="100%">
    <tr>
	<td>
	    <table>
		<?php if ($mensaje)
		{ ?>
    		<tr>
    		    <th colspan="3" class="msg_error"><?php echo $mensaje ?></th>
    		</tr>
<?php } ?>
		<tr>
		    <td class="columna_titulos"><?php echo form::label('login', 'Usuario:') ?></td>
		    <td><?php echo form::input('login') ?></td>
		</tr>
		<tr>
		    <td><?php echo form::label('clave', 'Contrase&ntilde;a:') ?></td>
		    <td><?php echo form::password('clave') ?></td>
		</tr>
		<tr>
		    <td colspan="3"><?php echo form::submit(array('class' => 'button'), 'Iniciar Sesion') ?></td>
		</tr>
		<tr>
		    <td colspan="3"><a href='<?php echo url::site('usuario/recuperar') ?>'><?php echo html_Core::image('media/img/iconos/key_delete.png', array('class' => 'icono', 'alt' => 'Recuperar Contrase&ntilde;a')) ?>&iquest;Olvidaste tu contrase&ntilde;a?</a></td>
		</tr>
	    </table>
	</td>
	<td>
	    <div class="center">
		<h3>Si a&uacute;n no est&aacute;s registrado, hazlo totalmente gratis:</h3>
<?php echo html_Core::anchor(url::site('usuario/suscribir'), html_Core::image('media/img/btn_registrar.png', 'Registrar', FALSE)) ?>
	    </div>
	</td>
    </tr>
</table>

<?php echo form::close() ?>
