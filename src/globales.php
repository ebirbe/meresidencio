<?php

//defined('SYSPATH') or die('No se permite el acceso directo al script');
/**
 * Este archivo contiene variables utilizadas a lo largo de todo el sitio
 */
/**
 * Necesario para insertar la publicidad de PHPads

  if(is_file('publicidad/ads.php'))
  {
  include 'publicidad/ads.php';
  }
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
 * Tamaño de miniaturas
 */
define('IMG_MINI_ANCHO', 80);
define('IMG_MINI_ALTO', 60);

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

/* * *************************************************************
 *  CONFIGURACIONES DE LAS VISTAS
 * ************************************************************** */

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
 * Variables de Correos Electronicos
 */
//CORREOS ELECTRONICOS
define('MAIL_ADMIN', 'admin@meresidencio.com');
define('MAIL_DE', NOMBRE_SITIO . ' <' . MAIL_ADMIN . '>');
//ASUNTOS
define('MAIL_ASNT_BIENVENIDA', 'Registro exitoso en ' . NOMBRE_SITIO);
define('MAIL_ASNT_ALERTA', 'Han publicado una residencia para ti');
define('MAIL_ASNT_OFERTAR', 'Datos de residencia solicitada');
define('MAIL_ASNT_OFERTA_NUEVA', 'Se han interesado por tu publicacion en ' . NOMBRE_SITIO);
define('MAIL_ASNT_CONTACTO', 'Nuevo comentario de usuario');
define('MAIL_ASNT_RECUPERAR', 'Datos de Acceso a ' . NOMBRE_SITIO);
define('MAIL_ASNT_CALIFICARON', 'Te calificaron en ' . NOMBRE_SITIO);
define('MAIL_ASNT_RESPONDIERON', 'Respondieron tu calificacion en ' . NOMBRE_SITIO);
?>