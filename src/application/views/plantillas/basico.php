<?php
$menu = array(
    "Principal" => url::base(),
    "Residencias" => array(
	"Buscar Residencia" => url::site("publicacion/lista"),
	"Publicar Residencia" => url::site("publicacion/agregar"),
    ),
    "Usuario" => array(
	"Inicio" => url_Core::site("usuario/mi_cuenta"),
	"Alertas" => url_Core::site("alerta/mis_alertas"),
	"Solicitudes" => url_Core::site("usuario/mis_solicitudes"),
	"Datos personales" => url_Core::site("usuario/mis_datos"),
	"Publicaciones propias" => url_Core::site("publicacion/mis_publicaciones"),
	"Calificaciones" => url_Core::site("calificacion/mis_calificaciones"),
	"Cambiar clave" => url_Core::site("usuario/cambiar_clave"),
    ),
    "Nosotros" => array(
	"&iquest;Quienes Somos?" => url::site("nosotros/quienes"),
	"Mision" => url::site("nosotros/mision"),
	"Vision" => url::site("nosotros/vision"),
    ),
    "Contacto" => url::site("nosotros/contacto"),
);

if ($usr_tipo == USUARIO_ADMIN)
{
    $menu["Administrar"] = array(
	"Inicio" => url::site("admin"),
	"Usuarios" => url::site("usuario/buscar"),
	"Publicaciones" => url::site("publicacion/lista"),
	"Comentarios" => url::site("comentario"),
	"Imagenes" => url::site("imagen/todas"),
	"Regiones" => url::site("estado"),
	"Otros" => array(
	    "Tipos de Inmueble" => url::site("tipoinmueble"),
	    "Comodidades" => url::site("servicio"),
	    "Cercan&iacute;as" => url::site("cercania"),
	),
    );
}

function dibujar_menu($m, $c)
{
    switch ($c)
    {
	case 0:
	    $class = "item";
	    break;
	case 1:
	    $class = "item";
	    break;
	case 2:
	    $class = "";
	    break;
	default:
	    $class = "item";
	    break;
    }
    foreach ($m as $t => $u)
    {
	if (is_array($u))
	{
	    echo "<li><a href='#'>$t</a>\n";
	    echo "<ul>\n";
	    dibujar_menu($u, $c + 1);
	    echo "</ul>\n";
	    echo "</li>";
	}
	else
	{
	    echo "<li><a href='$u' class='$class'>$t</a></li>\n";
	}
    }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
    <head>
	<meta name="description" content="Promocion y Alquiler de Residencias Estudiantiles en Venezuela" />
	<meta name="keywords" content="Promocion Alquiler Residencias Estudiantiles Universidad Venezuela" />
	<meta name="copyright" content="Erick Birbe" />
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="revisit-after" content="1 day" />
	<meta name="robots" content="all" />

	<link rel="Shortcut Icon" type="image/png" href="<?php echo url::base()."media/img/favicon.png" ?>" />

	<!-- Pull in the JQUERY library -->
	<?php echo html_Core::script('media/js/jquery-1.3.2.js', FALSE) ?>
	<!-- CSS principal -->
	<?php echo html_Core::stylesheet('media/css/main', 'screen', FALSE) ?>


	<!-- Pull in and set up the DROPDOWN functionality -->
	<?php echo html_Core::stylesheet('media/css/superfish', 'screen', FALSE) ?>
	<?php echo html_Core::script('media/js/hoverIntent.js', FALSE) ?>
	<?php echo html_Core::script('media/js/superfish.js', FALSE) ?>
	<script type="text/javascript">
	    $(document).ready(function(){
		$("ul.sf-menu").superfish();
	    });
	</script>
	<!-- JQUERY LIGHTBOX para la presentacion de imagenes -->
	<?php echo html_Core::script('media/js/jquery.lightbox-0.5.min.js', FALSE) ?>
	<?php echo html_Core::stylesheet('media/css/jquery.lightbox-0.5', 'screen', FALSE) ?>
	<!-- Ativando o jQuery lightBox plugin -->
	<script type="text/javascript">
	    $(function() {
		$('a.lightbox').lightBox({
		    imageLoading: '<?php echo url::base() . "media/img/lightbox-ico-loading.gif" ?>',
		    imageBtnClose: '<?php echo url::base() . "media/img/lightbox-btn-close.gif" ?>',
		    imageBtnPrev: '<?php echo url::base() . "media/img/lightbox-btn-prev.gif" ?>',
		    imageBtnNext: '<?php echo url::base() . "media/img/lightbox-btn-next.gif" ?>',
		    imageBlank:  '<?php echo url::base() . "media/img/lightbox-blank.gif" ?>',
		    txtImage: 'Im&aacute;gen',
		    txtOf: 'de'
		});
	    });
	</script>
	<title><?php echo "MeResidencio - Residencias estudiantiles - " . $titulo; ?></title>
    </head>
    <body>
	<?php
	if (!IN_PRODUCTION)
	{
	?>
    	<div style="background-color: yellow;color: red; text-align: center"><h2>ESTE SITIO AUN ESTA EN DESARROLLO</h2></div>
	<?php } ?>
	<div id="alert-container">
	    <table class="alerta center">
		<tr>
		    <td width="125px"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="MeResidencio" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></td>
		    <td width="125px"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.facebook.com/meresidencio" layout="button_count" show_faces="false" width="100"></fb:like></td>
		</tr>
	    </table>
	</div>
	<div class="header-bg"></div>
	<!-- Centers the page -->
	<div id="content">
	    <!-- Header -->
	    <div id="header">
		<h1><a href="<?php echo url_Core::base() ?>"><?php echo NOMBRE_SITIO ?></a></h1>
		<span class="logo2"> <!--<?php echo SLOGAN ?>--> </span>
	    </div>
	    <!-- END header -->
	    <!-- Navigation -->
	    <div id="navigation" class="nav">
		<ul id="nav" class="sf-menu">
		    <?php
		    dibujar_menu($menu, 0);
		    ?>
		</ul>
	    </div>
	    <!-- END navigation -->

		<table width="980px" class="center">
		    <tr>
			<td><?php echo html::image("media/img/blank.gif", array("width"=>"240","height"=>"125")) ?></td>
			<td><?php echo html::image("publicidad/480x125.gif") ?></td>
			<td><?php echo html::image("media/img/blank.gif", array("width"=>"240","height"=>"125")) ?></td>
		    </tr>
		</table>

		    <!-- Content -->
		    <div id="main-content" class="clear">
			<div class="right">
		    <?php echo $intro_lateral ?>
		    <?php echo $panel_sesion ?>
		    <?php echo $panel_opciones ?>
		    <?php echo $notificaciones ?>
		    <table width="125px">
			<tr>
			    <td><?php echo html::image("media/img/blank.gif", array("width"=>"125","height"=>"240")) ?></td>
			</tr>
			<tr>
			    <td><?php echo html::image("media/img/blank.gif", array("width"=>"125","height"=>"240")) ?></td>
			</tr>
		    </table>
		</div>
		<div class="left">
		    <?php echo $contenido ?>
		</div>
		<div class="clear"></div>
	    </div>
	</div>
	<!-- END content -->
	<div id="footer">
	    <p>Generada con <a href="http://kohanaphp.com">Kohana</a> en
    		{execution_time} segundos, usando {memory_usage} de memoria.</p>
	    <p>Algunos <a href="http://www.famfamfam.com/lab/icons/silk/">iconos</a>
    		son de licencia Creative Commons</p>
	    <p>&copy; Copyrigth 2010, Erick Birbe.</p>
	</div>
	<?php
		    if (IN_PRODUCTION)
		    {
	?>
			<!-- GOOGLE ANALYTICS -->

			<script type="text/javascript">
			    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			    try {
				var pageTracker = _gat._getTracker("UA-15595959-1");
				pageTracker._trackPageview();
			    } catch(err) {}
			</script>
	<?php } ?>
    </body>
</html>
