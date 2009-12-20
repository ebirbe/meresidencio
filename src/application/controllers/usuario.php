<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Usuario_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Usuario");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}
	
	/**
	 * Pone todos los campos en blanco, listo para ser utilizado
	 */
	public function limpiar_formulario(){
		$this->formulario = array(
			'activo' => '',
			'login' => '',
			'clave' => '',
			'correo' => '',
			'nombre' => '',
			'apellido' => '',
			'fecha_nac' => '',
			'telefono' => '',
			'estado' => '',
			'ciudad' => '',
			'zona' => '',
		);
	}

	public function index() {
		$this->template->titulo = "Administracion de Usuarios";
		$contenido = html_Core::anchor('usuario/buscar', 'Buscar Usuario');
		$contenido .= "<br>";
		$contenido .= html_Core::anchor('usuario/suscribir', 'Suscribir Usuario');
		$this->template->contenido = $contenido;
	}

	public function suscribir() {
		$exito = true;
		$vista = new View('usuario/suscribir');
		if($_POST){
			if($exito = $this->_suscribir()){
				$this->template->titulo = "Felicitaciones {$_POST['nombre']}! Registro exitoso.";
				$vista = new View('usuario/bienvenida');
				$vista->nombre = $_POST['nombre'];
				$vista->apellido = $_POST['apellido'];
				$vista->login = $_POST['login'];
				$this->limpiar_formulario();
			}
		}
		$vista->errores = $this->errores;
		$vista->formulario = $this->formulario;
		$vista->mensaje = $this->mensaje;
		$this->template->contenido = $vista;
	}

	/**
	 * Validacion
	 */
	public function _validar($editar = NULL) {

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		//Evita que en la edicion se verifique los campos no editables requeridos
		if(!$editar){
			$post->add_rules('correo','required', 'email');
			$post->add_rules('login','required', 'standard_text','length[1,45]');
			$post->add_rules('clave','required', 'standard_text','length[4,20]');

			$post->add_callbacks('login', array($this, '_unico'));
			$post->add_callbacks('correo', array($this, '_unico'));
		}
		$post->add_rules('correo','required', 'email');
		$post->add_rules('nombre','required', 'standard_text','length[1,45]');
		$post->add_rules('apellido','required', 'standard_text','length[1,45]');
		$post->add_rules('telefono','phone[11]');

		$exito = $post->validate();

		$this->mensaje = "Problema al Guardar";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('usuario_errores'));

		return $exito;
	}

	/**
	 * Permite validar si el correo esta incluido en la
	 * base de datos, generando un error si es asi.
	 * @param Validation_Core $array
	 * @param string $campo
	 */
	public function _unico(Validation_Core  $array, $campo){

		switch ($campo) {
			case 'login':
				$condicion = array(
					'login' => $array[$campo],
				);
				$existe = (bool)ORM::factory('usuario')->where($condicion)->count_all();
				if($existe){
					$array->add_error($campo, 'existe');
				};
				break;
					
			case 'correo':
				$condicion = array(
					'correo' => $array[$campo],
				);
				$existe = (bool)ORM::factory('usuario')->where($condicion)->count_all();
				if($existe){
					$array->add_error($campo, 'existe');
				};
				break;
		}
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 * de los usuarios en la base de datos
	 *
	 */
	public function _suscribir(){
		$exito = false;
		$datos = $_POST;
		$usuario = new Usuario_Model();
		if($this->_validar()){
			$usuario->correo = $datos['correo'];
			$usuario->nombre = $datos['nombre'];
			$usuario->apellido = $datos['apellido'];
			$usuario->login = $datos['login'];
			$usuario->clave = $datos['clave'];
			$usuario->tipo = 1;
			$usuario->activo = true;
			$usuario->save();
			$exito = true;
		}
		return $exito;
	}

	/**
	 * Genera la vista de edicion.
	 * @param int $id
	 */
	public function editar($id){

		$this->template->titulo = html::specialchars("Datos del Usuario");

		$this->llenar_formulario($id);

		$vista = new View("usuario/datos");
		if($_POST){
			if($this->_editar($id)){
				$this->mensaje = "Los datos se guard&aacute;ron con &eacute;xito.";
			}
		}

		$usuario = new Usuario_Model($id);

		$vista->script_combo = new View('js/combo_regiones');
		$vista->estado = Estado_Model::combobox($usuario->estado_id);
		$vista->ciudad = Ciudad_Model::combobox($usuario->estado_id, $usuario->ciudad_id, TRUE);
		$vista->zona = Zona_Model::combobox($usuario->ciudad_id, $usuario->zona_id, TRUE);

		$vista->mensaje = $this->mensaje;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;

		$this->template->contenido = $vista;
	}

	public function llenar_formulario($id){
		$usuario = ORM::factory('usuario',$id);
		$this->formulario = array(
			'activo' => $usuario->activo,
			'login' => $usuario->login,
			'clave' => $usuario->clave,
			'correo' => $usuario->correo,
			'nombre' => $usuario->nombre,
			'apellido' => $usuario->apellido,
			'fecha_nac' => $usuario->fecha_nac,
			'telefono' => $usuario->telefono,
			'estado' => $usuario->estado_id,
			'ciudad' => $usuario->ciudad_id,
			'zona' => $usuario->zona_id,
		);
	}

	/**
	 * Procesa las solicitudes de edicion
	 * @param int $id
	 */
	public function _editar($id){
		$exito = false;
		$datos = $_POST;
		$usuario = new Usuario_Model($id);
		if($this->_validar(TRUE)){
			//Campos que no se editan pero los coloco para que
			//la validacion no de problemas de 'required'
			$usuario->login = $usuario->login;
			$usuario->correo = $usuario->correo;
			
			$usuario->activo = (boolean)$datos['activo'];
			$usuario->nombre = $datos['nombre'];
			$usuario->apellido = $datos['apellido'];
			$usuario->fecha_nac = $datos['fecha_nac'];
			$usuario->telefono = $datos['telefono'];

			//Condicion si el usuario no ha seleccionado una fecha
			if($datos['fecha_nac'] == '') $usuario->fecha_nac = NULL;
			else $usuario->fecha_nac = $datos['fecha_nac'];

			//Condicionales si el usuario aun no ha seleccionado una region
			if($datos['estado'] == 0) $usuario->estado_id = NULL;
			else $usuario->estado_id = $datos['estado'];
			if($datos['ciudad'] == 0) $usuario->ciudad_id = NULL;
			else $usuario->ciudad_id = $datos['ciudad'];
			if($datos['zona'] == 0) $usuario->zona_id = NULL;
			else $usuario->zona_id = $datos['zona'];

			$usuario->save();
			$usuario->clear_cache();//Para que los datos que sean solicitados nuevamente no esten corruptos
			$exito = true;
		}
		return $exito;
	}
	
	public function buscar(){
		$this->template->titulo = "Buscar Usuarios";
		
		$vista = new View('usuario/buscar');
		if(isset($_POST['buscar'])){
			$vista->usuario = $this->_buscar($_POST['buscar']);
		}else{
			$vista->usuario = ORM::factory('usuario')->find_all();
		}
		
		$this->template->contenido = $vista;
	}
	
	public function _buscar($string){
		$condicion = array(
			'nombre' => $string,
			'apellido' => $string,
			'login' => $string,
			'correo' => $string,
		);
		$usuario = ORM::factory('usuario')->orlike($condicion)->find_all();
		return $usuario;
	}
}
?>