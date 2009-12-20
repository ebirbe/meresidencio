<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Servicio_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Servicios");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}

	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'servicio' => '',
		);
	}

	public function index(){
		$contenido = Servicio_Model::combobox();
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('servicio/agregar','Nuevo Servicio');
		$contenido .= '<br>';
		$contenido .=  html_Core::anchor('servicio/lista','Ver Servicios');

		$this->template->contenido = $contenido;
	}

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function agregar(){

		$this->template->titulo = html::specialchars("Agregar un nuevo servicio");

		$vista = new View("servicio/agregar");
		if($_POST){
			if($this->_agregar($_POST)){
				$this->mensaje = $_POST['servicio']." se guardo con &eacute;xito.";
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
		$servicio = new Servicio_Model();
		if($this->_validar()){
			$servicio->nombre = $datos['servicio'];
			$servicio->save();
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
		$post->add_rules('servicio','required', 'standard_text','length[3,45]');

		$exito = $post->validate();

		$this->mensaje = "Problema al Guardar";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('formulario_errores'));

		return $exito;
	}

	/**
	 * Genera la Lista de todos los estados
	 * incluidos en la base de datos
	 */
	public function lista(){

		$vista = new View('servicio/lista');
		$vista->cabecera_tabla = 'Servicios';
		$servicio = new Servicio_Model();
		$vista->servicio = $servicio->find_all()->as_array();
		$this->template->contenido = $vista;
	}

	/**
	 * Genera la vista de edicion.
	 * @param int $id
	 */
	public function editar($id){

		$this->template->titulo = html::specialchars("Editar Servicio");

		$this->formulario = array(
			'servicio' => ORM::factory('servicio',$id)->nombre,
		);

		$vista = new View("servicio/agregar");
		if($_POST){
			if($this->_editar($_POST, $id)){
				$this->mensaje = $_POST['servicio']." se guard&oacute; con &eacute;xito.";
			}
		}

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
		$servicio = new servicio_Model($id);
		if($this->_validar()){
			$servicio->nombre = $datos['servicio'];
			$servicio->save();
			$servicio->clear_cache();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Genera la vista de borrado.
	 * @param int $id
	 */
	public function borrar($id){

		ORM::factory('servicio', $id)->delete();

		$contenido = "Borrado";
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('servicio/lista', '<- Volver');
		$this->template->contenido = $contenido;
	}
}
?>