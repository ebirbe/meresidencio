<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Nosotros_Controller extends Template_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Modulo de Administracion");
	}

	public function index(){

	}

	public function quienes(){
		$this->template->titulo = "Quienes Somos?";
		$vista = new View('nosotros/quienes');
		$this->template->contenido = $vista;
	}

	public function mision(){
		$this->template->titulo = "Mision";
		$vista = new View('nosotros/mision');
		$this->template->contenido = $vista;
	}

	public function vision(){
		$this->template->titulo = "Vision";
		$vista = new View('nosotros/vision');
		$this->template->contenido = $vista;
	}

	public function contacto(){
		$this->template->titulo = "Contacto";
		$vista = new View('nosotros/contacto');
		$mensaje = NULL;
		if($_POST){
			$mail = new View('mail/contacto');
			$mail->nombre = htmlentities($_POST['nombre']);
			$mail->correo = htmlentities($_POST['correo']);
			$mail->mensaje = htmlentities($_POST['mensaje']);
			Mail_Model::enviar(MAIL_DE, MAIL_ASNT_CONTACTO,$mail);
			$mensaje = "<div class='msg_exito'>Su comentario se envio con exito.</div>";
		}
		$vista->mensaje = $mensaje;
		$this->template->contenido = $vista;
	}
}