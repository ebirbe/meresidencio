<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Zona_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Zona");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}

	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'zona' => '',
		);
	}

	public function index($ciudad_id = NULL){
		$datos = $_POST;
		$datos = arr::extract($datos, 'estado', 'ciudad');
		
		//Se inicia sin parametros
		if ($ciudad_id == NULL) {

			//Indicar Estado
			if ($datos['estado']==NULL && $datos['ciudad']== NULL){
				$contenido = "Debe seleccionar un Estado primero:<br>";
				$contenido.= form::open();
				$contenido.= Estado_Model::combobox();
				$contenido.= form::submit(NULL,"Continuar");
				$contenido.= form::close();

			}else if($datos['ciudad']== NULL && $datos['estado'] !=NULL){
				//Indicar Ciudad
				$contenido = "Ahora debe seleccionar una Ciudad:<br>";
				$contenido.= form::open();
				$contenido.= Ciudad_Model::combobox($datos['estado']);
				$contenido.= form::submit(NULL,"Continuar");
				$contenido.= form::close();

			}else{
				//Redireccionar con pase de parametros
				url::redirect('zona/index/'.$datos['ciudad']);
			}
			
		}else{
			//Ya se tienen todos los recaudos previos
			$contenido = Zona_Model::combobox($ciudad_id);
			$contenido .= "<br>";
			$contenido .= html_Core::anchor('zona/agregar/'.$ciudad_id,'Agregar Zona');
			$contenido .= '<br>';
			$contenido .=  html_Core::anchor('zona/lista/'.$ciudad_id,'Ver Zonas');
		}
		
		//Se imprime el contenido
		$this->template->contenido = $contenido;
	}

	/**
	 * Genera la vista de borrado.
	 * @param int $id
	 */
	public function borrar($id){

		ORM::factory('zona', $id)->delete();
		$contenido = "Borrado";
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('zona', '<-Volver');
		$this->template->contenido = $contenido;
	}

	/**
	 * Genera la vista de edicion.
	 * @param int $id
	 */
	public function editar($ciudad_id, $id){

		$this->template->titulo = html::specialchars("Editar Zona");

		$zona = ORM::factory('zona',$id);
		$ciudad = ORM::factory('ciudad', $ciudad_id);

		$this->formulario = array(
			'zona' => $zona->nombre,
		);

		$vista = new View("zona/agregar");
		if($_POST){
			if($this->_editar($id)){
				$this->mensaje = $_POST['zona']." se guard&oacute; con &eacute;xito.";
			}
		}

		$vista->mensaje = $this->mensaje;
		$vista->nombreCiudad = $ciudad->nombre;
		$vista->ciudad_id = $ciudad_id;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;

		$this->template->contenido = $vista;
	}

	/**
	 * Procesa las solicitudes de edicion
	 * @param $_POST
	 * @param int $id
	 */
	public function _editar($id){
		$exito = false;
		$datos = $_POST;
		$zona = new Zona_Model($id);
		if($this->_validar()){
			$zona->nombre = $datos['zona'];
			$zona->save();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Genera la Lista de todos los estados
	 * incluidos en la base de datos
	 */
	public function lista($ciudad_id){

		$condicion = array(
			'ciudad_id' => $ciudad_id,
		);

		$vista = new View('zona/lista');
		$vista->cabecera_tabla = 'Lista de Zonas';
		$zona = new Zona_Model();
		$vista->zona = $zona->where($condicion)->find_all()->as_array();
		//$vista->ciudad_id = $ciudad_id;
		$this->template->contenido = $vista;
	}

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function agregar($ciudad_id){

		$this->template->titulo = html::specialchars("Agregar un nueva Zona");

		$vista = new View("zona/agregar");
		if($_POST){
			if($this->_agregar($ciudad_id)){
				$this->mensaje = $_POST['zona']." se guard&oacute; con &eacute;xito.";
				$this->limpiar_formulario();
			}
		}

		$vista->mensaje = $this->mensaje;
		$vista->nombreCiudad = ORM::factory('ciudad',$ciudad_id)->nombre;
		$vista->ciudad_id = $ciudad_id;
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
		$condicion = array(
			'nombre' => $array[$campo],
		);
		$existe = (bool)ORM::factory('zona')->where($condicion)->count_all();
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
		$post->add_rules('zona','required', 'standard_text','length[3,100]');
		$post->add_callbacks('zona', array($this, '_unico'));

		$exito = $post->validate();

		$this->mensaje = "Problema al Guardar";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('formulario_errores'));

		return $exito;
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 * de los estados en la base de datos
	 *
	 */
	public function _agregar($ciudad_id){
		$exito = false;
		$datos = $_POST;
		$ciudad = new Zona_Model();
		if($this->_validar()){
			$ciudad->nombre = $datos['zona'];
			$ciudad->ciudad_id = $ciudad_id;
			$ciudad->save();
			$exito = true;
		}
		return $exito;
	}
}
?>