<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Calificacion_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Calificaciones");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}
	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'puntos' => '',
			'razon' => ''
			);
	}

	public function index(){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);

		$this->template->contenido = NULL;
	}

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function calificar($calificacion_id){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN), MSJ_INICIAR_SESION);

		$redireccion = url::site('usuario/mis_solicitudes');

		$calificacion = ORM::factory('calificacion', $calificacion_id);
		$publicacion = ORM::factory('publicacion', $calificacion->publicacion_id);

		$this->template->titulo = html::specialchars("Calificar publicacion $publicacion->id");
		$vista = new View("calificacion/calificar");

		$calificar = TRUE;
		//Si ya se ha calificado la operacion
		if($calificacion->razon != ''){
			$calificar = FALSE;
			$vista->calificacion = $calificacion;
		}else{
			//Si aun NO se ha calificado la operacion
			if($_POST){
				if($this->_calificar_como_cliente($calificacion_id)){
					header("Location: $redireccion");
				}
			}

			$vista->formulario = $this->formulario;
			$vista->errores = $this->errores;
		}
		
		$vista->calificar = $calificar;
		$this->template->contenido = $vista;
	}

	/**
	 * Validacion de los datos obtenidos a traves del metodo post
	 */
	public function _validar(){

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		$post->add_rules('razon','required', 'standard_text','length[3,255]');
		$post->add_rules('puntos','required');

		$exito = $post->validate();

		$this->mensaje = "Problema al Guardar";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('calificacion_errores'));

		return $exito;
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 */
	public function _calificar_como_cliente($calificacion_id){
		$exito = false;
		$datos = $_POST;
		$estado = new Calificacion_Model($calificacion_id);
		if($this->_validar()){
			$estado->puntos = $datos['puntos'];
			$estado->razon = $datos['razon'];
			$estado->save();
			$exito = true;
		}
		return $exito;
	}
}
?>