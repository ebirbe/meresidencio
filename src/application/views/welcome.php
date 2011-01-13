<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>

<h2>Bienvenido a <?php echo NOMBRE_SITIO ?></h2>
<table class="tabla_ext">
	<tr>
		<td align="center"><?php echo html::anchor(url::site('publicacion/agregar'), html_Core::image('media/img/publica.png', 'Publica tu Residencia', FALSE))?></td>
		<!--<td align="center"><?php echo html::anchor(url::site('usuario/suscribir'), html_Core::image('media/img/registrate.png', 'Registrate', FALSE))?></td> -->
		<td align="center"><?php echo html::anchor(url::site('publicacion/lista'), html_Core::image('media/img/consigue.png', 'Consigue Residencia', FALSE))?></td>
	</tr>
	<tr>
		<td class="txt-btn-descrip">
			<p>
				Si eres dueño de una residencia o tienes una habitaci&oacute;n desocupada
				que quieres alquilar, hazlo gratuitamente aqu&iacute; y de inmediato
				aparecerá entre nuestra lista de residencias en alquiler con los siguientes
				beneficios:
			</p>
			<ul>
				<li>Es gratis.</li>
				<li>Publicas desde tu propio hogar.</li>
				<li>Llegas al p&uacute;blico correcto.</li>
				<li>Tus clientes te buscan a ti.</li>
			</ul>
		</td>
		<!-- <td class="txt-btn-descrip">
			<p>
				Disfruta de todas las ventajas de ser un usuario registrado.
			</p>
			<p>
				<b>Si buscas residencia:</b>
			</p>
				<ul>
					<li>Contacta con los propietarios.</li>
					<li>Si no encuentras lo que buscas suscribete a nuestras alertas.</li>
					<li>Califica las publicaciones.</li>
				</ul>
			<p>
				<b>Si quieres alquilar:</b>
			</p>
				<ul>
					<li>Publica Gratis.</li>
					<li>Administra tus publicaciones.</li>
					<li>Enterate cuando se interesen en tu residencia.</li>
				</ul>
		</td> -->
		<td class="txt-btn-descrip">
			<p>
				Consigue la residencia que se adapta a tu gusto y necesidad revisando
				a traves de nuestro amplio cat&aacute;logo de publicaciones.
			</p>
			<p>
				Nuestro principal inter&eacute;s es brindarte una plataforma
				tecnol&oacute;gica amigable que facilite el proceso de buscar
				y alquilar una residencia.
			</p>
			<p>
				Aprovecha nuestros filtros de
				b&uacute;squeda y dem&aacute;s beneficios que te ofrecemos
				para conseguir la residencia que necesitas.
			</p>
		</td>
	</tr>
</table>
<!-- 
<p class="intro-text">En este portal podras disfrutar de las ventajas
tecnologicas que te ofrecemos para conseguir residencias estudiantiles
en alquiler desde la comodidad de tu casa. De igual modo, si tienes en mente alquilar habitaciones o cualquier otro
inmueble a jovenes estudiantes universitarios, este es el sitio
adecuado. Si deseas conocer mas sobre nosotros visita nuestra seccion <a
	href="<?php echo url::site("nosotros/quienes")?>">&iquest;Quienes
Somos?</a>.</p>
<div class="clear"></div>
 -->
<?php echo $publicaciones_aleatorias ?>
<br/>