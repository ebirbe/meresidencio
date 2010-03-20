<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Estado_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Estado");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}
	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'estado' => '',
		);
	}

	public function index(){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);

		$this->agregar();
		
		/*$contenido = Estado_Model::combobox();
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('estado/agregar','Agregar Estado');
		$contenido .= '<br>';
		$contenido .=  html_Core::anchor('estado/lista','Ver Estados');

		$this->template->contenido = $contenido;*/
	}
	/**
	 * Genera la vista de borrado.
	 * @param int $id
	 */
	public function borrar($id){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);
		
		ORM::factory('estado', $id)->delete();
		$this->auto_render = false;
		header("Location: ". url::site("estado"));
	}

	/**
	 * Genera la vista de edicion.
	 * @param int $id
	 */
	public function editar($id){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);

		//TODO Implementar
		$this->template->titulo = html::specialchars("Editar Estado");

		$this->formulario = array(
			'estado' => ORM::factory('estado',$id)->nombre,
		);

		$vista = new View("estado/agregar");
		if($_POST){
			if($this->_editar($_POST, $id)){
				$this->mensaje = "<div class='msg_exito'>".$_POST['estado']." se guard&oacute; con &eacute;xito.</div>";
			}
		}
		
		$estado = new Estado_Model();
		$vista->estado = $estado->find_all()->as_array();
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
		$estado = new Estado_Model($id);
		if($this->_validar()){
			$estado->nombre = $datos['estado'];
			$estado->save();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Genera la Lista de todos los estados
	 * incluidos en la base de datos
	 */
	public function lista(){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);

		$vista = new View('estado/lista');
		$estado = new Estado_Model();
		$vista->estado = $estado->find_all()->as_array();
		$this->template->contenido = $vista;
	}

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function agregar(){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);

		$this->template->titulo = html::specialchars("Agregar un nuevo Estado");

		$vista = new View("estado/agregar");
		if($_POST){
			if($this->_agregar($_POST)){
				$this->mensaje = "<div class='msg_exito'>".$_POST['estado']." se guardo con &eacute;xito.</div>";
				$this->limpiar_formulario();
			}
		}

		$estado = new Estado_Model();
		$vista->estado = $estado->find_all()->as_array();
		
		$vista->mensaje = $this->mensaje;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;
		$this->template->contenido = $vista;
	}

	/**
	 * Permite validar si el estado esta incluido en la
	 * base de datos, generando un error si es asi.
	 * @param Validation_Core $array
	 * @param string $campo
	 */
	public function _unico(Validation_Core  $array, $campo){
		$existe = (bool)ORM::factory('estado')->where('nombre',$array[$campo])->count_all();
		if($existe){
			$array->add_error($campo, 'existe');
		}
	}

	/**
	 * Validacion de los datos obtenidos a traves del metodo post
	 */
	public function _validar(){

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		$post->add_rules('estado','required', 'standard_text','length[3,100]');
		$post->add_callbacks('estado', array($this, '_unico'));

		$exito = $post->validate();

		$this->mensaje = "<div class='msg_error'>Problema al Guardar<div>";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('formulario_errores'));

		return $exito;
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 * de los estados en la base de datos
	 *
	 */
	public function _agregar(){
		$exito = false;
		$datos = $_POST;
		$estado = new Estado_Model();
		if($this->_validar()){
			$estado->nombre = $datos['estado'];
			$estado->save();
			$exito = true;
		}
		return $exito;
	}
}
?>