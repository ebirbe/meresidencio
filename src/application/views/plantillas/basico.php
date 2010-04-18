<?php
$menu = array(
	"Inicio" => url::base(),
	"Usuario" => array(
		"Inicio" => url_Core::site("usuario/mi_cuenta"),
		"Mis Alertas" => url_Core::site("alerta/mis_alertas"),
		"Mis solicitudes" => url_Core::site("usuario/mis_solicitudes"),
		"Mis Datos" => url_Core::site("usuario/mis_datos"),
		"Cambiar Clave" => url_Core::site("usuario/cambiar_clave"),
),
	"Residencias" => array(
		"Buscar Residencia" => url::site("publicacion/lista"),
		"Publicar Residencia" => url::site("publicacion/agregar"),
		"Mis Publicaciones" => url_Core::site("publicacion/mis_publicaciones"),
		"Mis calificaciones" => url_Core::site("calificacion/mis_calificaciones"),
),
	"Nosotros" => array(
		"&iquest;Quienes Somos?" => url::site("nosotros/quienes"),
		"Mision" => url::site("nosotros/mision"),
		"Vision" => url::site("nosotros/vision"),
),
	"Contacto" => url::site("nosotros/contacto"),
);

if($usr_tipo == USUARIO_ADMIN){
	$menu["Administrar"] = array(
		"Inicio" => url::site("admin"),
		"Usuarios" => url::site("usuario/buscar"),
		"Publicaciones" => url::site("publicacion/lista"),
		"Imagenes" => url::site("imagen/todas"),
		"Regiones" => url::site("estado"),
		"Otros" => array(
			"Tipos de Inmueble"=> url::site("tipoinmueble"),
			"Comodidades"=> url::site("servicio"),
			"Cercan&iacute;as"=> url::site("cercania"),
	),
	);
}

function dibujar_menu($m, $c){
	switch ($c) {
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
			$class="item";
			break;
	}
	foreach ($m as $t => $u) {
		if(is_array($u)){
			echo "<li><a href='#'>$t</a>\n";
			echo "<ul>\n";
			dibujar_menu($u,$c+1);
			echo "</ul>\n";
			echo "</li>";
		}else{
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
		
		<link rel="Shortcut Icon" type="image/ico" href="favicon.ico" />
		
		<!-- Pull in the JQUERY library -->
		<?php echo html_Core::script('media/js/jquery-1.3.2.js', FALSE) ?>
		<?php echo html_Core::stylesheet('media/css/main','screen', FALSE) ?>
		
		
		<!-- Pull in and set up the DROPDOWN functionality -->
		<?php echo html_Core::script('media/js/hoverIntent.js', FALSE) ?>
		<?php echo html_Core::script('media/js/superfish.js', FALSE) ?>
		<script type="text/javascript"> 
			$(document).ready(function(){ 
				$("ul.sf-menu").superfish();
			});
		</script>
		<!-- Introducimos el JQUERY LIGHTBOX-->
		<?php echo html_Core::script('media/js/jquery.lightbox-0.5.min.js', FALSE) ?>
		<?php echo html_Core::stylesheet('media/css/jquery.lightbox-0.5','screen', FALSE) ?>
		<!-- Ativando o jQuery lightBox plugin -->
		<script type="text/javascript">
		    $(function() {
		    	$('a.lightbox').lightBox({
		    		imageLoading: '<?php echo url::base()."media/img/lightbox-ico-loading.gif" ?>',
		    		imageBtnClose: '<?php echo url::base()."media/img/lightbox-btn-close.gif" ?>',
		    		imageBtnPrev: '<?php echo url::base()."media/img/lightbox-btn-prev.gif" ?>',
		    		imageBtnNext: '<?php echo url::base()."media/img/lightbox-btn-next.gif" ?>',
		    		imageBlank:  '<?php echo url::base()."media/img/lightbox-blank.gif" ?>',
		    		txtImage: 'Im&aacute;gen',
		    		txtOf: 'de'
		    	   });
		    });
		</script>
		<title><?php echo html_Core::specialchars(NOMBRE_SITIO). " - Residencias en alquiler - ".$titulo; ?></title>
	</head>
	<body>
		<!-- Centers the page -->
		<div id="content">
			<!-- Header -->
			<div id="header">
				<h1><a href="<?php echo url_Core::base() ?>"><?php echo NOMBRE_SITIO ?></a></h1>
				<span class="logo2"> <!--<?php echo SLOGAN ?>--> </span>
		</div>
		<!-- END header -->
		<!-- Navigation 
		<div id="navigation">
			<ul id="nav" class="sf-menu">
				<?php
				dibujar_menu($menu, 0);
				?>
			</ul>
		</div>
		 END navigation -->
		<!-- Content -->
		<div id="main-content">
			<div class="right">
				<?php echo $intro_lateral ?> <?php echo $panel_sesion ?>
				<?php echo $panel_opciones ?> <?php echo $notificaciones ?>
			</div>
			<div class="left">
				<?php echo $contenido ?>
			</div>
			<!--
			<div class="publicidad">
				<div class="cuadro_pub">
				<p class="center"><strong>Espacio disponible</strong></p>
				<p class="center"><strong>125px X 150px</strong></p>
				<p class="center"><strong><?php echo html::anchor(url::site('nosotros/contacto'), "Contactanos")?></strong></p>
				</div>
			</div>
			-->
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
		<!--INICIO WEBOSCOPE MeResidencio.com -->
		<!-- SOLO MODIFICAR WEBO_ZONE Y WEBO_PAGE
		<?php
		if(!isset($web_zone)) $web_zone=WEBO_Z_NULL;
		if(!isset($web_page)) $web_page=WEBO_P_NULL;
		?> <script type="text/javascript">
							WEBO_ZONE=<?php echo $web_zone?>;
							WEBO_PAGE=<?php echo $web_page?>;
							weboscope_ok=0;
						</script> <script type="text/javascript"
			src="http://es.weborama.fr/scripts/weboscope_free_es.js"></script> <script
			type="text/javascript">
							if(weboscope_ok==1){weboscope_free(WEBO_ZONE,WEBO_PAGE,426207);}
						</script>
		<noscript>
		<p><a href="http://www.weboscope.com/?LANGUAGE=ES">Weboscope
		medici&oacute;n de audiencia y de eficacia</a> <a
			href="http://www.weboscope.com/free/?LANGUAGE=ES">Estadsticas gratuitas</a>
		</p>
		</noscript>
		 FIN WEBOSCOPE COPYRIGHT WEBORAMA-->
		<p><?php echo "Z:$web_zone - P:$web_page" ?></p>
		
		<!--
		<a class="first" href="index-2.html">Home</a>
		    &nbsp;|&nbsp;
		    <a href="services.html">Our Services</a>
		    &nbsp;|&nbsp;
		    <a href="history.html">Our History</a>
		    &nbsp;|&nbsp;
		    <a href="portfolio.html">Our Portfolio</a>
		    &nbsp;|&nbsp;
		    <a href="gallery.html">Photo Gallery</a>
		    &nbsp;|&nbsp;
		    <a class="last" href="contact.html">Contact Us</a>
		    
		    <span>Copyright &copy; 2008 Business Professional Package</span>
		    -->
		</div>
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
	</body>
</html>
