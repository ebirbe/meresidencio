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
define('MAIL_DE', NOMBRE_SITIO.' <admin@meresidencio.com>');
//ASUNTOS
define('MAIL_ASNT_BIENVENIDA', 'Registro exitoso en '. NOMBRE_SITIO);
define('MAIL_ASNT_ALERTA', 'Han publicado una residencia para ti');
define('MAIL_ASNT_OFERTAR', 'Datos de residencia solicitada');
define('MAIL_ASNT_CONTACTO', 'Nuevo comentario de usuario');
define('MAIL_ASNT_RECUPERAR', 'Datos de Acceso a '. NOMBRE_SITIO);

/**
 * Estadisticas WEBOSCOPE
 */
// INDEX
define('WEBO_Z_INDEX', 1);
define('WEBO_P_INDEX', 1);
// PUBLICACION
define('WEBO_Z_PUBLICA', 2);
define('WEBO_P_PUBLICA_LISTA', 1);
define('WEBO_P_PUBLICA_DETALLE', 2);
define('WEBO_P_PUBLICA_OFERTA', 3);
define('WEBO_P_PUBLICA_AGREGAR', 4);
define('WEBO_P_PUBLICA_EDITAR', 5);
define('WEBO_P_PUBLICA_IMAGEN', 6);
// USUARIO
define('WEBO_Z_USUARIO', 3);
define('WEBO_P_USUARIO_INICIO', 1);
define('WEBO_P_USUARIO_NOTIFI', 2);
define('WEBO_P_USUARIO_SOLICITUD', 3);
define('WEBO_P_USUARIO_PUBLICA', 4);
define('WEBO_P_USUARIO_SUSCRIBIR', 5);
define('WEBO_P_USUARIO_EDITAR', 6);
define('WEBO_P_USUARIO_SESION', 7);
define('WEBO_P_USUARIO_DENEGADO', 8);
define('WEBO_P_USUARIO_CLAVE', 9);
define('WEBO_P_USUARIO_DATOS', 10);
define('WEBO_P_USUARIO_CONFIRMAR', 11);
define('WEBO_P_USUARIO_RECUPERAR', 12);
// ALERTA
define('WEBO_Z_ALERTA', 4);
define('WEBO_P_ALERTA_AGREGAR', 1);
define('WEBO_P_ALERTA_CONSULTAR', 1);
// CALIFICACIONES
define('WEBO_Z_CALIFICA', 5);
define('WEBO_P_CALIFICA_CLIENTE', 1);
define('WEBO_P_CALIFICA_PROPIETARIO', 2);
define('WEBO_P_CALIFICA_MIS', 3);
define('WEBO_P_CALIFICA_VER', 4);
// ADMIN
define('WEBO_Z_ADMIN', 6);
define('WEBO_P_ADMIN_INICIO', 1);
define('WEBO_P_ADMIN_USUARIO', 2);
define('WEBO_P_ADMIN_DATOS', 3);
// NOSOTROS
define('WEBO_Z_NOSOTROS', 7);
define('WEBO_P_NOSOTROS_QUIENES', 1);
define('WEBO_P_NOSOTROS_MISION', 2);
define('WEBO_P_NOSOTROS_VISION', 3);
define('WEBO_P_NOSOTROS_CONTACTO', 4);
// NULL
define('WEBO_Z_NULL', 1000000);
define('WEBO_P_NULL', 1000000);
?>