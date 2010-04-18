<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>

<h2>Bienvenido a <?php echo NOMBRE_SITIO ?></h2>
<table class="tabla_ext">
	<tr>
		<td align="center"><?php echo html::anchor(url::site('publicacion/agregar'), html_Core::image('media/img/publica.png', 'Publica tu Residencia', FALSE))?></td>
		<td align="center"><?php echo html::anchor(url::site('usuario/suscribir'), html_Core::image('media/img/registrate.png', 'Registrate', FALSE))?></td>
		<td align="center"><?php echo html::anchor(url::site('publicacion/lista'), html_Core::image('media/img/consigue.png', 'Consigue Residencia', FALSE))?></td>
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

<h2>Siguenos:</h2>
<br/>
<table class="tabla_ext">
	<tr>
		<td>
			<div class="center">
				<script type="text/javascript" src="http://static.ak.connect.facebook.com/connect.php/es_LA"></script>
				<script type="text/javascript">FB.init("5d53e7fbc28035958fc4bceedb4925c8");</script>
				<fb:fan profile_id="116064185070686" stream="0" connections="8" logobar="0" width="240" height="260"></fb:fan>
				<div style="font-size:8px; padding-left:10px"><a href="http://www.facebook.com/pages/MeResidencioCom/116064185070686">MeResidencio.Com</a> on Facebook</div>
			</div>
		</td>
		<td>
			<center>
				<script type="text/javascript" src="http://widgets.twimg.com/j/2/widget.js"></script>
				<script type="text/javascript">
					new TWTR.Widget({
					  version: 2,
					  type: 'profile',
					  rpp: 2,
					  interval: 6000,
					  width: 240,
					  height: 260,
					  theme: {
					    shell: {
					      background: '#deeff7',
					      color: '#2a78d1'
					    },
					    tweets: {
					      background: '#ffffff',
					      color: '#000000',
					      links: '#3157bf'
					    }
					  },
					  features: {
					    scrollbar: false,
					    loop: false,
					    live: false,
					    hashtags: true,
					    timestamp: false,
					    avatars: false,
					    behavior: 'all'
					  }
					}).render().setUser('MeResidencio').start();
				</script>
			</center>
		</td>
	</tr>
</table>
<br/>