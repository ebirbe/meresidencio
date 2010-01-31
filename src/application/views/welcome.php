<?php defined('SYSPATH') OR die('No direct access allowed.'); ?>
<h3><strong><em>Bienvenido a <?php echo NOMBRE_SITIO ?></em></strong></h3>
<p class="intro-text">En este portal podras disfrutar de las ventajas
tecnologicas que te ofrecemos para conseguir residencias estudiantiles
en alquiler desde la comodidad de tu casa.<br />
De igual modo, si tienes en mente alquilar habitaciones o cualquier otro
inmueble a jovenes estudiantes universitarios, este es el sitio
adecuado. Si deseas conocer mas sobre nosotros visita nuestra seccion <a
	href="<?php echo url::site("nosotros/quienes")?>">&iquest;Quienes
Somos?</a>.</p>

<div class="clear"></div>

<?php echo $publicaciones_aleatorias ?>

<!-- 
<h2>Publicaciones Aleatorias</h2>
<div class="portfolio-entry"> <?php 
$img = html_Core::image('media/img/gallery_01.jpg', array('alt'=>'Photo floating to the left', 'class'=>'img-left'), FALSE);
$url = url::base().'media/img/gallery_01_lg.jpg';
?> <a href="<?php echo $url ?>" class="lightbox"><?php echo $img ?></a>
<h3>Portfolio Entry 01</h3>

<p>This is the description of the portfolio item. This is the
description of the portfolio item. This is the description of the
portfolio item. This is the description of the portfolio item. This is
the description of the portfolio item. This is the description of the
portfolio item.</p>
</div>
<div class="clear"></div>
-->