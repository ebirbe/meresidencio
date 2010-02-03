<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Publicacion_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;
	protected $ultimo_id;
	protected $servicios_sel;
	protected $cercanias_sel;

	public function __construct()
	{
		parent::__construct();
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
			'servicio' => array(),
			'cercania' => array(),
			'activo' => '',
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

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE), MSJ_COMPLETAR_REGISTRO);

		$this->template->titulo = html::specialchars("Agregar una Publicacion Nueva");

		$vista = new View("publicacion/agregar");
		$vista->editar = FALSE;

		if($_POST){

			$datos = $_POST;
			//Reponemos los servcios seleccionados
			if(isset($datos['servicio'])) $this->servicios_sel = $datos['servicio'];
			//Reponemos las cercanias seleccionadas
			if(isset($datos['cercania'])) $this->cercanias_sel = $datos['cercania'];

			if($this->_agregar($_POST)){
				url::redirect(url::site("imagen/agregar/$this->ultimo_id"));
				$this->mensaje = "Se guard&oacute; con &eacute;xito.";
				$this->limpiar_formulario();
			}
		}

		$usuario = ORM::factory('usuario', $this->session->get('usuario')->id);

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
		$post->add_rules('sexo','required');
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

	/**
	 * Controla la salida en pantalla de el formulario
	 * para agregar estados.
	 */
	public function editar($publicacion_id){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE), MSJ_COMPLETAR_REGISTRO);

		$this->template->titulo = html::specialchars("Editar Publicacion Nro. $publicacion_id");

		$vista = new View("publicacion/agregar");
		$vista->editar = TRUE;

		$this->llenar_formulario($publicacion_id);

		if($_POST){
			if($this->_editar($publicacion_id)){
				//url::redirect(url::site("publicacion/detalles/$publicacion_id"));
				$this->mensaje = "Se guard&oacute; con &eacute;xito.";
				$this->llenar_formulario($publicacion_id);
			}
		}

		$usuario = ORM::factory('usuario', $this->session->get('usuario')->id);
		$vista->usuario_id = $usuario->id;
		$vista->mensaje = $this->mensaje;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;

		$this->template->contenido = $vista;
	}

	public function llenar_formulario($publicacion_id){
		$publicacion = ORM::factory('publicacion', $publicacion_id);

		$servicios = array();
		$cercanias = array();
		foreach ($publicacion->servicios as $aux){
			$servicios[] = $aux->id;
		}
		foreach ($publicacion->cercanias as $aux){
			$cercanias[] = $aux->id;
		}

		$this->formulario = array(
			'tipoinmueble' => $publicacion->tipoinmueble,
			'sexo' => $publicacion->sexo,
			'estado' => $publicacion->zona->ciudad->estado->id,
			'ciudad' => $publicacion->zona->ciudad->id,
			'zona' => $publicacion->zona_id,
			'direccion' => $publicacion->direccion,
			'habitaciones' => $publicacion->habitaciones,
			'mts' => $publicacion->mts,
			'precio' => $publicacion->precio,
			'deposito' => $publicacion->deposito,
			'descripcion' => $publicacion->descripcion,
			'activo' => $publicacion->activo,
			'servicio' => $servicios,
			'cercania' => $cercanias,
		);
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 * de los estados en la base de datos
	 *
	 */
	public function _editar($publicacion_id){
		$exito = false;
		$datos = $_POST;
		$publicacion = new Publicacion_Model($publicacion_id);

		if($this->_validar()){
			$publicacion->tipoinmueble_id = $datos['tipoinmueble'];
			$publicacion->sexo = $datos['sexo'];
			$publicacion->zona_id = $datos['zona'];
			$publicacion->direccion = $datos['direccion'];
			$publicacion->mts = $datos['mts'];
			$publicacion->descripcion = $datos['descripcion'];
			$publicacion->precio = $datos['precio'];
			$publicacion->deposito = $datos['deposito'];

			if(isset($datos['activo']))		$publicacion->activo = 1;
			else							$publicacion->activo = 0;
			if(isset($datos['servicio']))	$publicacion->servicios = $datos['servicio'];
			if(isset($datos['cercania']))	$publicacion->cercanias = $datos['cercania'];

			//Guarda la publicacion
			$publicacion->save();

			$publicacion->clear_cache();

			$exito = TRUE;
		}

		return $exito;
	}

	public function lista($token = NULL){

		$this->template->titulo = "Lista de Publicaciones";
		$vista = new View('publicacion/buscar');
		$vista->token = $this->_generar_token();
		$vista->url = 'publicacion/lista/';

		/**
		 * La busqueda no la puedo separar por ahora porque la
		 * paginacion requiere el uso de las funciones 'limit'
		 * y 'offset' las cuales no funcionan si antes de ellas
		 * llamo a un 'where'
		 */
		//CONDICION DE BUSQUEDA
		$datos = $this->_limpiar_datos_busqueda($_POST);
		$filtrar = FALSE;
		$where_cond['activo'] = 1;
		if($_POST){
			$this->session->set('pub_busqueda', $datos);
		}

		if($token != NULL){
			$parametros = $this->session->get('pub_busqueda');
			if ($token == $parametros['token']){
				$datos = $parametros;
			}
		}

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
			->where($where_cond)
			->orderby('publicaciones.id', 'DESC');
		}else{
			$publicaciones
			->where($where_cond)
			->orderby('publicaciones.id', 'DESC');
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
			->orderby('publicaciones.id', 'DESC')
			->limit($limit)
			->offset($offset)
			->find_all();
		}else{
			$publicaciones = $publicaciones
			->where($where_cond)
			->orderby('publicaciones.id', 'DESC')
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
			'token' => '',
		);
		foreach ($post as $key => $value) {
			if ($value !=0 || $post['sexo']!='') {
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
		$publicacion = ORM::factory("publicacion", $id);
		$vista->publicacion = $publicacion;
		$vista->vista_caracteristicas = new View('publicacion/caracteristicas');
		$vista->vista_caracteristicas->publicacion = $publicacion; 
		
		//Componemos el panel de opciones y los vinculos
		$v_opciones = new View('plantillas/panel_opciones');
		$links = array();
		if(is_a($usuario, "Usuario_Model") && $usuario->es_propio($publicacion->usuario_id)){
			$links[]=array(
				url::site('publicacion/editar/'.$publicacion->id),
				"Editar publicaci&oacute;n",
			);
			$links[]=array(
				url::site('publicacion/ofertar/'.$publicacion->id),
				"Editar im&aacute;genes",
			);
		}else{
			$links[]=array(
				url::site('publicacion/ofertar/'.$publicacion->id),
				"Ofertar",
			);
		}
		$v_opciones->links = $links;
		
		$this->template->panel_opciones = $v_opciones;
		$this->template->contenido = $vista;

	}

	public function mis_publicaciones(){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE));

		$id_usuario = $this->session->get('usuario')->id;

		$this->template->titulo = "Mis Publicaciones";
		$vista = new View('publicacion/buscar');
		$vista->token = $this->_generar_token();
		$vista->url = 'publicacion/mis_publicaciones/';

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

	public function _generar_token(){
		return mt_rand(1, 9999999999);
	}

	public function ofertar($publicacion_id){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN), MSJ_INICIAR_SESION);

		$usuario = $this->session->get('usuario');
		$publicacion = ORM::factory('publicacion', $publicacion_id);
		$calificacion = ORM::factory('calificacion', $publicacion_id)
		->where('publicacion_id', $publicacion_id)
		->where('cliente_id', $usuario->id)
		->find();

		if($calificacion->cliente_id == 0){
			//echo "NO HABIA OFERTADO";
			$calificacion_id = $this->_ofertar($publicacion_id, $usuario->id, $publicacion->usuario_id);
		}else{
			//echo "YA OFERTO";
			$calificacion_id = $calificacion->id;
		}
		
		$this->template->panel_opciones = new View('plantillas/panel_opciones');
		$links[] = array(
				url::site('calificacion/calificar/'.$calificacion_id),
				"Calificar Operaci&oacute;n",
		);
		$links[] = array(
				url::site('publicacion/detalles/'.$publicacion_id),
				"Ver Original",
		);
		$this->template->panel_opciones->links = $links;
		
		$this->template->titulo = "Solicitud de Alquiler";
		$vista = new View('publicacion/ofertar');
		$vista->publicacion = $publicacion;
		$vista->vista_caracteristicas = new View('publicacion/caracteristicas');
		$vista->vista_caracteristicas->publicacion = $publicacion;
		$vista->calificacion_id = $calificacion_id;
		$this->template->contenido = $vista;


	}

	public function _ofertar($publicacion_id, $cliente_id, $usuario_id){
		$calificacion = ORM::factory('calificacion');
		$calificacion->fecha = date('Y-m-d');
		$calificacion->puntos = CALIFICACION_SIN;
		$calificacion->cliente_id = $cliente_id;
		$calificacion->usuario_id = $usuario_id;
		$calificacion->publicacion_id = $publicacion_id;
		$calificacion->save();

		return $calificacion->id;
	}
}
?>
