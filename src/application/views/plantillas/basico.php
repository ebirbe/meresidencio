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
	"Publicaci&oacute;n" => array(
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
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="description" content="Promocion y Alquiler de Residencias Estudiantiles en Venezuela" />
    <meta name="keywords" content="Promocion Alquiler Residencias Estudiantiles Universidad Venezuela" />
    <meta name="copyright" content="meresidencio.com" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="revisit-after" content="1 day" />
    <meta name="robots" content="all" />
    
    <link rel="Shortcut Icon" type="image/ico" href="favicon.html" />
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    
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
    
    <title><?php echo html_Core::specialchars(NOMBRE_SITIO). " - ".$titulo; ?></title>
</head>

<body>
<!-- Centers the page -->
<div id="content">
	
    <!-- Header -->
    <div id="header">
		<h1><a href="<?php echo url_Core::base() ?>"><?php echo NOMBRE_SITIO ?></a></h1>
		<div class="logo2">
			<!--<?php echo SLOGAN ?>-->
		</div>
  	</div>
    <!-- END header -->
    
    <!-- Navigation -->
    <div id="navigation">
    	<ul id="nav" class="sf-menu">
    	
    		<?php
    			dibujar_menu($menu, 0);
    		?>
      	</ul>
    </div>
	<!-- END navigation -->

   <!-- Content -->
    <div id="main-content">
    	<div class="right">
            <?php echo $intro_lateral ?>
            <?php echo $panel_sesion ?>
            <?php echo $panel_opciones ?>
            <?php echo $notificaciones ?>
        </div>
    
    <!-- Barra de Historial
    <div>
   	<table class="tbl_navegar">
   		<tr>
   		<?php
   		if(is_array($historial)){
   			krsort($historial);
   			$i=0;
   			foreach ($historial as $fila){
   				if($i==3) break;
   		?>
   			<td class="btn_navegar"><?php echo html::anchor($fila[1], $fila[0])?></td>
   		<?php 
   			$i++;
   			}
   		}
   		?>
   		</tr>
   	</table>
   </div>
  END Barra de Historial -->
   
    <div class="left">
		        <?php echo $contenido ?>
      </div>
      <div class="clear"></div>
    </div>
</div>
<!-- END content -->

<div id="footer">
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
</body>
</html>