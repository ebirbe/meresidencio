<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Ciudad_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Ciudad");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}

	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'ciudad' => '',
		);
	}

	public function index($estado_id = NULL){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);
		
		$datos = $_POST;
		if ($estado_id == NULL) {
			if ($datos==NULL){
				$contenido = "Debe seleccionar un estado primero:<br>";
				$contenido.= form::open();
				$contenido.= Estado_Model::combobox();
				$contenido.= form::submit(NULL,"Continuar");
				$contenido.= form::close();
			}else{
				url::redirect('ciudad/index/'.$datos['estado']);
			}
		}else{
			$contenido = Ciudad_Model::combobox($estado_id);
			$contenido .= "<br>";
			$contenido .= html_Core::anchor('ciudad/agregar/'.$estado_id,'Agregar Ciudad');
			$contenido .= '<br>';
			$contenido .=  html_Core::anchor('ciudad/lista/'.$estado_id,'Ver Ciudades');
		}
		$this->template->contenido = $contenido;
	}

	/**
	 * Genera la vista de borrado.
	 * @param int $id
	 */
	public function borrar($id){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);
		
		$contenido = "Borrado";
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('ciudad', '<-Volver');
		$this->template->contenido = $contenido;
		ORM::factory('ciudad', $id)->delete();
	}

	/**
	 * Genera la vista de edicion.
	 * @param int $id
	 */
	public function editar($estado_id, $id){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);
	
		$this->template->titulo = html::specialchars("Editar Ciudad");

		$ciudad = ORM::factory('ciudad',$id);
		$estado = ORM::factory('estado', $estado_id);

		$this->formulario = array(
			'ciudad' => $ciudad->nombre,
		);

		$vista = new View("ciudad/agregar");
		if($_POST){
			if($this->_editar($id)){
				$this->mensaje = $_POST['ciudad']." se guard&oacute; con &eacute;xito.";
			}
		}

		$vista->mensaje = $this->mensaje;
		$vista->nombreEstado = $estado->nombre;
		$vista->estado_id = $estado_id;
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
		$ciudad = new Ciudad_Model($id);
		if($this->_validar()){
			$ciudad->nombre = $datos['ciudad'];
			$ciudad->save();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Genera la Lista de todos los estados
	 * incluidos en la base de datos
	 */
	public function lista($estado_id){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);

		$condicion = array(
			'estado_id' => $estado_id,
		);

		$vista = new View('ciudad/lista');
		$vista->cabecera_tabla = 'Lista de Ciudades';
		$ciudad = new Ciudad_Model();
		$vista->ciudad = $ciudad->where($condicion)->find_all()->as_array();
		$vista->estado_id = $estado_id;
		$this->template->contenido = $vista;
	}

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function agregar($estado_id){
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), USUARIO_ADMIN);
		
		$this->template->titulo = html::specialchars("Agregar un nueva Ciudad");

		$vista = new View("ciudad/agregar");
		if($_POST){
			if($this->_agregar($estado_id)){
				$this->mensaje = $_POST['ciudad']." se guard&oacute; con &eacute;xito.";
				$this->limpiar_formulario();
			}
		}

		$vista->mensaje = $this->mensaje;
		$vista->nombreEstado = ORM::factory('estado',$estado_id)->nombre;
		$vista->estado_id = $estado_id;
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
		$existe = (bool)ORM::factory('ciudad')->where($condicion)->count_all();
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
		$post->add_rules('ciudad','required', 'standard_text','length[3,100]');
		$post->add_callbacks('ciudad', array($this, '_unico'));

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
	public function _agregar($estado_id){
		$exito = false;
		$datos = $_POST;
		$ciudad = new Ciudad_Model();
		if($this->_validar()){
			$ciudad->nombre = $datos['ciudad'];
			$ciudad->estado_id = $estado_id;
			$ciudad->save();
			$exito = true;
		}
		return $exito;
	}
}
?>