<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Nosotros_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Informacion");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}

	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'nombre' => '',
			'correo' => '',
			'mensaje' => '',
			'captcha' => '',
		);
	}

	public function index(){

	}

	public function quienes(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_NOSOTROS;
		$this->template->web_page=WEBO_P_NOSOTROS_QUIENES;

		$this->template->titulo = "Quienes Somos?";
		$vista = new View('nosotros/quienes');
		$this->template->contenido = $vista;
	}

	public function mision(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_NOSOTROS;
		$this->template->web_page=WEBO_P_NOSOTROS_MISION;

		$this->template->titulo = "Mision";
		$vista = new View('nosotros/mision');
		$this->template->contenido = $vista;
	}

	public function vision(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_NOSOTROS;
		$this->template->web_page=WEBO_P_NOSOTROS_VISION;

		$this->template->titulo = "Vision";
		$vista = new View('nosotros/vision');
		$this->template->contenido = $vista;
	}

	public function contacto(){

		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_NOSOTROS;
		$this->template->web_page=WEBO_P_NOSOTROS_CONTACTO;

		$mensaje = NULL;
		if($_POST){
			if($this->_enviar_contacto()){
				$this->mensaje = "<div class='msg_exito'>Su comentario se envi&oacute; con exito.</div>";
			}
		}
		
		$captcha = new Captcha();
		
		$this->template->titulo = "Contacto";
		$vista = new View('nosotros/contacto');
		$vista->captcha = $captcha->render();
		$vista->mensaje = $this->mensaje;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;
		$this->template->contenido = $vista;
	}
	public function _enviar_contacto(){
		$exito = false;
		$datos = $_POST;
		if($this->_validar()){
			$mail = new View('mail/contacto');
			$mail->nombre = htmlentities($_POST['nombre']);
			$mail->correo = htmlentities($_POST['correo']);
			$mail->mensaje = htmlentities($_POST['mensaje']);
			Mail_Model::enviar(MAIL_DE, MAIL_ASNT_CONTACTO,$mail, $_POST['correo']);

			$exito = true;
		}
		return $exito;
	}
	
	public function _validar(){
		$post = new Validation_Core($_POST);
		$post->add_rules('nombre','required', 'standard_text','length[1,45]');
		$post->add_rules('correo','required', 'email');
		$post->add_rules('captcha','required', array('Captcha','valid'));

		$exito = $post->validate();

		$this->mensaje = "<div class='msg_error'>Problema al Enviar</div>";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('usuario_errores'));

		return $exito;
	}
}