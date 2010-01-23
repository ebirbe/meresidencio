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
			'razon' => '',
			'respuesta' => '',
			);
	}

	public function index(){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);

		$this->template->contenido = NULL;
	}


	public function calificar($calificacion_id){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN), MSJ_INICIAR_SESION);

		$redireccion = url::site('usuario/mis_solicitudes');

		$usuario = $this->session->get('usuario');
		$calificacion = ORM::factory('calificacion', $calificacion_id);
		$publicacion = ORM::factory('publicacion', $calificacion->publicacion_id);

		//Verifica que el cliente que esta accediendo es el
		//que hizo la oferta
		if($calificacion->cliente_id != $usuario->id){
			header("Location: $redireccion");
		}

		$this->template->titulo = html::specialchars("Calificar publicacion $publicacion->id");
		$vista = new View("calificacion/calificar");

		$calificar = TRUE;
		//Si ya se ha calificado la operacion
		if($calificacion->razon != ''){
			$calificar = FALSE;

			//Armamos la vista de que ya califico
			$vista_ya_califico = new View('calificacion/ya_califico');
			$vista_ya_califico->calificacion = $calificacion;

			//Montamos la vista_ya_califico sobre esta
			$vista->vista_ya_califico = $vista_ya_califico;
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

	public function responder_calificacion($calificacion_id){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE), MSJ_COMPLETAR_REGISTRO);

		$redireccion = url::site('calificacion/mis_calificaciones');

		$usuario = $this->session->get('usuario');
		$calificacion = ORM::factory('calificacion', $calificacion_id);
		$publicacion = ORM::factory('publicacion', $calificacion->publicacion_id);

		//Verifica que el usuario que esta accediendo es el
		//que hizo la publicacion
		if($calificacion->usuario_id != $usuario->id){
			header("Location: $redireccion");
		}

		$this->template->titulo = html::specialchars("Responder Calificacion para Publicacion Nro. $publicacion->id");
		$vista = new View("calificacion/responder_calificacion");

		//Armamos la vista de que ya califico
		$vista_ya_califico = new View('calificacion/ya_califico');
		$vista_ya_califico->calificacion = $calificacion;
		//Montamos la vista_ya_califico sobre esta
		$vista->vista_ya_califico = $vista_ya_califico;

		$responder = TRUE;

		//Si ya se ha respondido la calificacion
		if($calificacion->respuesta != ''){
			$responder = FALSE;
		}else{
			//Si aun NO se ha respondido la calificacion
			if($_POST){
				if($this->_responder_como_vendedor($calificacion_id)){
					header("Location: $redireccion");
				}
			}

			$vista->formulario = $this->formulario;
			$vista->errores = $this->errores;
		}

		$vista->responder = $responder;
		$this->template->contenido = $vista;
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 */
	public function _responder_como_vendedor($calificacion_id){
		$exito = false;
		$datos = $_POST;
		$estado = new Calificacion_Model($calificacion_id);
		if($this->_validar_respuesta()){
			$estado->respuesta = $datos['respuesta'];
			$estado->activa = FALSE;
			$estado->save();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Validacion de los datos obtenidos a traves del metodo post
	 */
	public function _validar_respuesta(){

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		$post->add_rules('respuesta','required', 'standard_text','length[3,255]');

		$exito = $post->validate();

		$this->mensaje = "Problema al Guardar";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('calificacion_errores'));

		return $exito;
	}
	
	public function mis_calificaciones(){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE), MSJ_COMPLETAR_REGISTRO);
		

		$usuario = $this->session->get('usuario');
		$calificaciones = ORM::factory('calificacion')
		->where('usuario_id', $usuario->id);
		
		$this->template->titulo = "Mis Calificaciones";

		$vista = new View('calificacion/mis_calificaciones');

		//Comienza a prepararse la Paginacion
		$paginacion = new Pagination(
		array(
					'uri_segment' => 'pagina',
					'total_items' => $calificaciones->count_all(),
					'items_per_page' => ITEMS_POR_PAGINA,
					'style' => 'classic',
		)
		);

		$limit = ITEMS_POR_PAGINA;
		$offset = $paginacion->sql_offset;

		$calificaciones = $calificaciones
		->where('usuario_id', $usuario->id)
		->orderby('id', 'DESC')
		->limit($limit)
		->offset($offset)
		->find_all();
		
		$vista->calificaciones = $calificaciones;
		$vista->paginacion = $paginacion;
		$this->template->contenido = $vista;

		//echo Kohana::debug($publicaciones);
	}
	
}
?>