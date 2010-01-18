<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Imagen_Controller extends Template_Controller {

	protected $formulario;
	protected $errores;
	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Im&aacute;genes");
		$this->limpiar_formulario();
		$this->errores = $this->formulario;
		$this->mensaje = '';
	}

	public function limpiar_formulario(){
		$this->formulario = array(
			'imagen1' => '',
			'imagen2' => '',
			'imagen3' => '',
		);
	}

	public function agregar($publicacion_id, $nueva_pub = FALSE){
		$this->template->titulo = "Agregar im&aacute;genes a la publicaci&oacute;n $publicacion_id";
		$vista = new View('imagen/agregar');

		if($nueva_pub) $this->mensaje = "Su publicaci&oacute;n se guardo con &eacute;xito bajo el Nro. $publicacion_id, si lo desea puede proceder a agregar im&aacute;genes a su publicaci&oacute;n";

		$publicacion = ORM::factory('publicacion', $publicacion_id);

		$vista->numero_imagenes = $publicacion->imagenes->count();

		if($_POST){
			if($this->_agregar($publicacion_id)){
				$this->mensaje = "Se guardo con &eacute;xito.";
				$this->limpiar_formulario();
			}
		}

		$vista->mensaje = $this->mensaje;
		$vista->publicacion = $publicacion;
		$vista->formulario = $this->formulario;
		$vista->errores = $this->errores;
		$vista->publicacion_id = $publicacion_id;
		$this->template->contenido = $vista;
	}

	/**
	 * Realiza todos los procesos relacionados a la insersion
	 * de los estados en la base de datos
	 *
	 */
	public function _agregar($publicacion_id){
		$exito = false;
		$publicacion = new Publicacion_Model();

		if($this->_validar()){

			Imagen_Model::guardar_imagen($_FILES['imagen1'], $publicacion_id);
			Imagen_Model::guardar_imagen($_FILES['imagen2'], $publicacion_id);
			Imagen_Model::guardar_imagen($_FILES['imagen3'], $publicacion_id);

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
		$post->add_callbacks('imagen1', array($this, '_mime_valido'));
		$post->add_callbacks('imagen2', array($this, '_mime_valido'));
		$post->add_callbacks('imagen3', array($this, '_mime_valido'));

		$exito = $post->validate();

		$this->mensaje = "Problema al Guardar";
		$this->formulario = arr::overwrite($this->formulario, $post->as_array());
		$this->errores = arr::overwrite($this->errores, $post->errors('imagen_errores'));

		return $exito;
	}

	public function _mime_valido(Validation_Core  $array, $campo){
		$nombre = $_FILES[$campo]['name'];
		if(strlen($nombre) > 0){
			$ext = strtolower(substr($nombre, -4, 4));
			if($ext != ".jpg" && $ext != ".png" && $ext != ".gif"){
				$ext = strtolower(substr($nombre, -5, 5));
				if($ext != ".jpeg"){
					$array->add_error($campo, 'extension');
				}
			}
		}
	}

	/**
	 * Las Vistas hacen el llamado a este metodo para que
	 * imprima las imagenes de las publicaciones
	 *
	 * @param int $id_img
	 *
	 */
	public function mostrar($id_img = NULL){

		$this->template->contenido = NULL;

		$this->template->auto_render = FALSE;
		$this->auto_render = FALSE;
		Imagen_Model::generar_imagen($id_img, TRUE);
			
	}

	public function album($id_pub, $pagina = NULL){
		define('LIMIT', 1);

		$this->template->titulo = html::specialchars("Imagenes para la publicacion $id_pub");
		$vista = new View('imagen/album');

		$imagen = ORM::factory('imagen')->where('publicacion_id', $id_pub);
		$paginacion = new Pagination(
		array(
					'uri_segment' => 'pagina',
					'total_items' => $imagen->count_all(),
					'items_per_page' => LIMIT,
					'style' => 'classic',
		)
		);
		$offset = $paginacion->sql_offset;

		$imagen = $imagen->where('publicacion_id', $id_pub)->limit(LIMIT)->offset($offset)->find();

		$vista->id_pub = $id_pub;
		$vista->id_img = $imagen->id;
		$vista->paginacion = $paginacion;

		$this->template->contenido = $vista;
	}

}
?>
