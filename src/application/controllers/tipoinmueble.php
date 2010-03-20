<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Tipoinmueble_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Tipos de Inmueble");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}

	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'tipoinmueble' => '',
		);
	}

	public function index(){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN,));
		
		$this->agregar();
		
		/*
		$contenido = Tipoinmueble_Model::combobox();
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('tipoinmueble/agregar','Nuevo Tipo de Inmueble');
		$contenido .= '<br>';
		$contenido .=  html_Core::anchor('tipoinmueble/lista','Ver Tipo de Inmueble');

		$this->template->contenido = $contenido;
		*/
	}

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function agregar(){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN,));

		$this->template->titulo = html::specialchars("Agregar un nuevo Tipo de Inmueble");

		$vista = new View("tipoinmueble/agregar");
		if($_POST){
			if($this->_agregar($_POST)){
				$this->mensaje = "<div class='msg_exito'>".$_POST['tipoinmueble']." se guardo con &eacute;xito.</div>";
				$this->limpiar_formulario();
			}
		}
		
		$vista->mensaje = $this->mensaje;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;

		$this->template->contenido = $vista;
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 * de los estados en la base de datos
	 *
	 */
	public function _agregar(){
		$exito = false;
		$datos = $_POST;
		$tipo_in = new Tipoinmueble_Model();
		if($this->_validar()){
			$tipo_in->nombre = $datos['tipoinmueble'];
			$tipo_in->save();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Validacion de los datos obtenidos a traves del metodo post
	 */
	public function _validar(){

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		$post->add_rules('tipoinmueble','required', 'standard_text','length[3,45]');

		$exito = $post->validate();

		$this->mensaje = "<div class='msg_error'>Problema al Guardar</div>";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('formulario_errores'));

		return $exito;
	}

	/**
	 * Genera la Lista de todos los estados
	 * incluidos en la base de datos
	 */
	public function lista(){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN,));

		$vista = new View('tipoinmueble/lista');
		$vista->cabecera_tabla = 'Tipos de Inmuebles';
		$tipo_in = new Tipoinmueble_Model();
		$vista->tipo_in = $tipo_in->find_all()->as_array();
		$this->template->contenido = $vista;
	}

	/**
	 * Genera la vista de edicion.
	 * @param int $id
	 */
	public function editar($id){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN,));

		$this->template->titulo = html::specialchars("Editar Tipo de Inmueble");

		$this->formulario = array(
			'tipoinmueble' => ORM::factory('tipoinmueble',$id)->nombre,
		);

		$vista = new View("tipoinmueble/agregar");
		if($_POST){
			if($this->_editar($_POST, $id)){
				$this->mensaje = "<div class='msg_exito'>".$_POST['tipoinmueble']." se guard&oacute; con &eacute;xito.</div>";
			}
		}

		$vista->editar = TRUE;
		$vista->mensaje = $this->mensaje;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;

		$this->template->contenido = $vista;
	}

	/**
	 * Procesa las solicitudes de edicion
	 * @param $_POST
	 * @param int $id
	 */
	public function _editar($_POST, $id){
		$exito = false;
		$datos = $_POST;
		$tipo_in = new Tipoinmueble_Model($id);
		if($this->_validar()){
			$tipo_in->nombre = $datos['tipoinmueble'];
			$tipo_in->save();
			$tipo_in->clear_cache();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Genera la vista de borrado.
	 * @param int $id
	 */
	public function borrar($id){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN,));

		ORM::factory('tipoinmueble', $id)->delete();
		$this->auto_render = false;
		header("Location: ". url::site("tipoinmueble"));

		/*$contenido = "Borrado";
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('tipoinmueble/lista', '<- Volver');
		$this->template->contenido = $contenido;*/
	}
}
?>