<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Mail_Controller extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function ofertar(){
		$publicacion = ORM::factory('publicacion')->orderby(NULL, 'RAND()')->find();
		$mail = new View('mail/ofertar');
		$mail->publicacion = $publicacion;
		echo $mail;
	}

	public function bienvenida(){
		$mail = new View('mail/bienvenida');
		$mail->usuario = ORM::factory('usuario')->orderby(NULL, 'RAND()')->find();
		echo $mail;
	}

	public function alerta(){
		$mail = new View('mail/alerta');
		$mail->usuario = ORM::factory('usuario')->orderby(NULL, 'RAND()')->find();
		$mail->publicacion = ORM::factory('publicacion')->orderby(NULL, 'RAND()')->find();
		echo $mail;
	}
	public function contacto(){
		$mail = new View('mail/contacto');
		$mail->nombre = "Usuario Prueba";
		$mail->correo = "correo@pruebas.com";
		$mail->mensaje = "MEnsaje Cualquiera enviado desde la web";
		echo $mail;
	}
	public function recuperar(){
		$mail = new View('mail/recuperar');
		$mail->usuario = ORM::factory('usuario')->orderby(NULL, 'RAND()')->find();
		echo $mail;
	}
}