<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h2><strong>Bienvenido a <?php echo NOMBRE_SITIO ?></strong></h2>
<table class="tabla_ext">
	<tr>
		<td align="center"><?php echo html::anchor(url::site('publicacion/agregar'), html_Core::image('media/img/publica.png', 'Publica tu Residencia', FALSE))?></td>
		<td align="center"><?php echo html::anchor(url::site('usuario/suscribir'), html_Core::image('media/img/registrate.png', 'Registrate', FALSE))?></td>
		<td align="center"><?php echo html::anchor(url::site('publicacion/lista'), html_Core::image('media/img/consigue.png', 'Consigue Residencia', FALSE))?></td>
	</tr>
</table>
<p class="intro-text">En este portal podras disfrutar de las ventajas
tecnologicas que te ofrecemos para conseguir residencias estudiantiles
en alquiler desde la comodidad de tu casa. De igual modo, si tienes en mente alquilar habitaciones o cualquier otro
inmueble a jovenes estudiantes universitarios, este es el sitio
adecuado. Si deseas conocer mas sobre nosotros visita nuestra seccion <a
	href="<?php echo url::site("nosotros/quienes")?>">&iquest;Quienes
Somos?</a>.</p>
<div class="clear"></div>

<?php echo $publicaciones_aleatorias ?>