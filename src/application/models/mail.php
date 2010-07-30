<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Mail_Model {
	public static function enviar($para, $asunto, $mensaje, $de = MAIL_DE){
		email::send($para, $de, $asunto, $mensaje, TRUE);
	}
}
?>