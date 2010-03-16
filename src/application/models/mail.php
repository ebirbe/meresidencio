<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Mail_Model {
	public static function enviar($para, $asunto, $mensaje){
		email::send($para, MAIL_DE, $asunto, $mensaje, TRUE);
	}
}
?>