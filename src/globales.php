<?php //defined('SYSPATH') or die('No se permite el acceso directo al script');
/**
 * Este archivo contiene variables utilizadas a lo largo de todo el sitio
 */

/**
 * Numeros de publicaciones y usuarios 
 * que se muestran en los resultados de
 * las busquedas.
 */
define('ITEMS_POR_PAGINA', 5);

/**
 * La cantidad de imagenes maxima permitida para
 * las publicaciones
 */
define('MAXIMO_IMAGENES', 6);

/**
 * Numeros Identificadores de cada tipo de Usuario
 */
define('USUARIO_ADMIN', 1);
define('USUARIO_VENDE', 2);
define('USUARIO_COMUN', 3);


/**
 * Mensajes de error
 */
define('MSJ_INICIAR_SESION', 0);
define('MSJ_COMPLETAR_REGISTRO', 1);
define('MSJ_SOLO_ADMIN', 2);

/**
 * Calificaciones
 */
define('CALIFICACION_SIN', 0);
define('CALIFICACION_NULA', 1);
define('CALIFICACION_EXITO', 2);
define('CALIFICACION_FALLIDA', 3);

/***************************************************************
*  CONFIGURACIONES DE LAS VISTAS
****************************************************************/

/**
 * Titulo o Nombre del sitio Web, ejemplo
 * MeResidencio.com 
 */
define('NOMBRE_SITIO', 'MeResidencio.Com');

/**
 * Slogan de la pagina web
 */
define('SLOGAN', "<strong>Mudate Ya!</strong>");

/**
 * Primera columna que aperece en la barra lateral
 */
define('INTRO_LATERAL', 
	"<h2><em><strong>Informaci&oacute;n</strong></em></h2>\n
	 <p>La nueva web para la promoci&oacute;n de residencias estudiantiles te da la bienvenida a su portal. Gracias por Visitarnos!!</p>\n
	 <div class='clear'></div>\n"
);

/**
 * Variables de Correos Electronicos
 */
//CORREOS ELECTRONICOS
define('MAIL_DE', NOMBRE_SITIO.' <erickcion@gmail.com>');
//ASUNTOS
define('MAIL_ASNT_BIENVENIDA', 'Registro exitoso en '. NOMBRE_SITIO);
define('MAIL_ASNT_ALERTA', 'Han publicado una residencia para ti');
define('MAIL_ASNT_OFERTAR', 'Datos de residencia solicitada');
define('MAIL_ASNT_CONTACTO', 'Nuevo comentario de usuario');
?>