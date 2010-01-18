<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Publicacion_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;
	protected $ultimo_id;

	public function __construct()
	{
		parent::__construct();
		$this->session = Session::instance();
		$this->template->titulo = html::specialchars("Administracion de Publicaciones");
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
			'sexo' => '',
			'estado' => '',
			'ciudad' => '',
			'zona' => '',
			'direccion' => '',
			'habitaciones' => '',
			'mts' => '',
			'precio' => '',
			'deposito' => '',
			'descripcion' => '',
		);
	}

	public function index(){
		$contenido = "<br>";
		$contenido .= html_Core::anchor('publicacion/agregar','Agregar Publicacion');
		$contenido .= '<br>';
		$contenido .=  html_Core::anchor('publicacion/lista','Buscar Publicaciones');
		$contenido .= '<br>';
		$contenido .=  html_Core::anchor('publicacion/mis_publicaciones','Mis Publicaciones');

		$this->template->contenido = $contenido;
	}

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function agregar(){

		$this->template->titulo = html::specialchars("Agregar una Publicacion Nueva");

		$vista = new View("publicacion/agregar");
		if($_POST){
			if($this->_agregar($_POST)){
				url::redirect(url::site("imagen/agregar/$this->ultimo_id"));
				$this->mensaje = "Se guard&oacute; con &eacute;xito.";
				$this->limpiar_formulario();
			}
		}
		//TODO Cambiar esto por un id usuario real
		$usuario = ORM::factory('usuario', 1);
		$vista->usuario_id = $usuario->id;
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
		$publicacion = new Publicacion_Model();

		if($this->_validar()){
			$publicacion->usuario_id = $datos['usuario'];
			$publicacion->tipoinmueble_id = $datos['tipoinmueble'];
			$publicacion->sexo = $datos['sexo'];
			$publicacion->zona_id = $datos['zona'];
			$publicacion->direccion = $datos['direccion'];
			$publicacion->mts = $datos['mts'];
			$publicacion->descripcion = $datos['descripcion'];
			$publicacion->precio = $datos['precio'];
			$publicacion->deposito = $datos['deposito'];
			$publicacion->activo = 1;

			if(isset($datos['servicio']))	$publicacion->servicios = $datos['servicio'];
			if(isset($datos['cercania']))	$publicacion->cercanias = $datos['cercania'];

			//Guarda la publicacion
			$publicacion->save();
			$this->ultimo_id = $publicacion->id;

			$exito = TRUE;
		}

		return $exito;
	}


	/**
	 * Validacion de los datos obtenidos a traves del metodo post
	 */
	public function _validar(){

		$post = new Validation_Core($_POST);
		$post->pre_filter('trim');
		$post->add_rules('tipoinmueble','required');
		$post->add_rules('estado','required');
		$post->add_rules('ciudad','required');
		$post->add_rules('zona','required');
		$post->add_rules('direccion','standard_text', 'length[0,200]');
		$post->add_rules('habitaciones','numeric', 'required');
		$post->add_rules('mts','numeric');
		$post->add_rules('precio', 'numeric', 'required');
		$post->add_rules('deposito','numeric');

		$post->add_callbacks('tipoinmueble', array($this, '_no_cero'));
		$post->add_callbacks('estado', array($this, '_no_cero'));
		$post->add_callbacks('ciudad', array($this, '_no_cero'));
		$post->add_callbacks('zona', array($this, '_no_cero'));

		$exito = $post->validate();

		$this->mensaje = "Problema al Guardar";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('publicacion_errores'));

		return $exito;
	}

	public function _no_cero(Validation_Core  $array, $campo){
		if($array[$campo] == 0){
			$array->add_error($campo, 'required');
		}
	}

	public function lista(){
		$this->template->titulo = "Lista de Publicaciones";
		$vista = new View('publicacion/buscar');

		/**
		 * La busqueda no la puedo separar por ahora porque la
		 * paginacion requiere el uso de las funciones 'limit'
		 * y 'offset' las cuales no funcionan si antes de ellas
		 * llamo a un 'where'
		 */
		//CONDICION DE BUSQUEDA
		$datos = $this->_limpiar_datos_busqueda($_POST);
		$filtrar = FALSE;
		$where_cond = NULL;

		foreach ($datos as $clave => $valor){
			if($valor != NULL){

				$filtrar = true;

				switch ($clave){
					case "estado":
					case "ciudad":
					case "zona":
					case "tipoinmueble":
						//en todos estos casos concatenamos '_id' para coincidir con la BD
						$where_cond[$clave."_id"] = $valor;
						break;

					case "sexo":
						//Este nombre queda igual
						$where_cond[$clave] = $valor;
						break;
				}
			}
		}
		//FIN CONDICION DE BUSQUEDA

		$publicaciones = ORM::factory('publicacion');
		$join_tbl = array(
			'zonas',
			'ciudades',
			'estados',
		);
		$join_cond = array(
			'publicaciones.zona_id' => 'zonas.id',
			'zonas.ciudad_id' => 'ciudades.id',
			'ciudades.estado_id' => 'estados.id',
		);

		/**
		 * Estas sentencias las coloco aca y las repito mas adelante
		 * RAZON: La paginacion requiere saber el numero total
		 * de filas generadas por una sentencia para definir cual
		 * sera la ultima pagina. La repito mas adelante porque la
		 * paginacion es la que devuelve el OFFSET que nos es mas que
		 * el primer item de la pagina que se va a mostrar (desde donde
		 * comienza a mostrarse la lista).
		 */

		if($filtrar){
			$publicaciones
			->select('*')
			->join($join_tbl, $join_cond)
			->where($where_cond);
		}else{
			$publicaciones;
		}

		//Comienza a prepararse la Paginacion
		$paginacion = new Pagination(
		array(
					'uri_segment' => 'pagina',
					'total_items' => $publicaciones->count_all(),
					'items_per_page' => ITEMS_POR_PAGINA,
					'style' => 'classic',
		)
		);

		$limit = ITEMS_POR_PAGINA;
		$offset = $paginacion->sql_offset;

		if($filtrar){
			$publicaciones = $publicaciones
			->select('publicaciones.*, zonas.ciudad_id, ciudades.estado_id')//Necesario porque sino selecciona solo 'publicaciones.*' y no los demas campos
			->join($join_tbl, $join_cond)
			->where($where_cond)
			->limit($limit)
			->offset($offset)
			->find_all();
		}else{
			$publicaciones = $publicaciones
			->limit($limit)
			->offset($offset)
			->find_all();
		}

		$vista->publicacion = $publicaciones;
		$vista->paginacion = $paginacion;
		$this->template->contenido = $vista;

		//echo Kohana::debug($publicaciones);

	}

	public function _limpiar_datos_busqueda($post){
		$array = array(
			'estado' => '',
			'ciudad' => '',
			'zona' => '',
			'tipoinmueble' => '',
			'sexo' => '',
		);
		foreach ($post as $key => $value) {
			if ($value != 0) {
				$array[$key] = $value;
			};
		}
		return $array;
	}

	public function detalles($id = NULL){

		$this->template->titulo = "Lista de Publicaciones";
		$vista = new View('publicacion/detalles');

		$usuario = $this->session->get('usuario');
		if($usuario){
			$vista->usuario_sesion = $usuario;
		}
		$vista->publicacion = ORM::factory("publicacion", $id);
		$this->template->contenido = $vista;

	}

	public function mis_publicaciones($id_usuario){

		$this->template->titulo = "Mis Publicaciones";
		$vista = new View('publicacion/buscar');

		$publicaciones = ORM::factory('publicacion');

		$publicaciones->where('usuario_id', $id_usuario);

		//Comienza a prepararse la Paginacion
		$paginacion = new Pagination(
		array(
						'uri_segment' => 'pagina',
						'total_items' => $publicaciones->count_all(),
						'items_per_page' => ITEMS_POR_PAGINA,
						'style' => 'classic',
		)
		);

		$limit = ITEMS_POR_PAGINA;
		$offset = $paginacion->sql_offset;

		$publicaciones = $publicaciones
		->where('usuario_id', $id_usuario)
		->limit($limit)
		->offset($offset)
		->find_all();

		$vista->publicacion = $publicaciones;
		$vista->paginacion = $paginacion;
		$this->template->contenido = $vista;

	}
}
?>
