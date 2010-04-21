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
	public function oferta_nueva(){
		$calificacion = ORM::factory('calificacion')->orderby(NULL, 'RAND()')->find();
		$cliente = ORM::factory('usuario',$calificacion->cliente_id);
		$mail = new View('mail/oferta_nueva');
		$mail->calificacion = $calificacion;
		$mail->cliente = $cliente;
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
		$mail->mensaje = "Mensaje Cualquiera enviado desde la web";
		echo $mail;
	}
	public function recuperar(){
		$mail = new View('mail/recuperar');
		$mail->usuario = ORM::factory('usuario')->orderby(NULL, 'RAND()')->find();
		echo $mail;
	}
	public function calificaron(){
		$calificacion = ORM::factory('calificacion')->where("razon <>", "")->orderby(NULL, 'RAND()')->find();
		$cliente = ORM::factory('usuario',$calificacion->cliente_id);
		$mail = new View('mail/calificaron');
		$mail->calificacion = $calificacion;
		$mail->cliente = $cliente;
		echo $mail;
	}
	public function respondieron(){
		$calificacion = ORM::factory('calificacion')->where("respuesta <>", "")->orderby(NULL, 'RAND()')->find();
		$mail = new View('mail/respondieron');
		$mail->calificacion = $calificacion;
		echo $mail;
	}
}