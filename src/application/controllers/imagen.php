<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Imagen_Controller extends Template_Controller {

	protected $mensaje;

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Im&aacute;genes");
		$this->mensaje = '';
	}

	public function agregar($publicacion_id, $nueva_pub = FALSE){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE), MSJ_COMPLETAR_REGISTRO);

		$this->template->titulo = "Agregar im&aacute;genes a la publicaci&oacute;n $publicacion_id";
		$vista = new View('imagen/agregar');

		if($nueva_pub) $this->mensaje = "<div class='msg_exito'>Su publicaci&oacute;n se guardo con el ID #$publicacion_id. Ahora puede agregar im&aacute;genes a su publicaci&oacute;n</div>";

		$publicacion = ORM::factory('publicacion', $publicacion_id);
		$vista->numero_imagenes = $publicacion->imagenes->count();

		if($_POST){
			if($this->_agregar($publicacion_id)){
				$this->mensaje = "<div class='msg_exito'>Se guardo con &eacute;xito.</div>";

				//Pedimos que realice de nuevo la consulta para contemplar los nuevos datos
				$publicacion->reload();
				//Necesito volver a contar los registros ya que se han agregado nuevos
				$vista->numero_imagenes = $publicacion->imagenes->count();
			}
		}

		$vista->mensaje = $this->mensaje;
		$vista->publicacion = $publicacion;
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

		$files = Validation::factory($_FILES)
		->add_rules('imagen', 'upload::valid','upload::type[gif,jpg,jpeg,png]', 'upload::size[5M]');


		if ($files->validate())
		{
			foreach( arr::rotate($_FILES['imagen']) as $file ){
				// Si esta vacio el campo no hace nada
				if($file['name']=='')continue;

				// Nombre de archivo temporal
				$filename = upload::save($file);
				$img = Image::factory($filename);

				// Preparacion de Tabla en la BD
				$imagen = new Imagen_Model();
				$imagen->publicacion_id = $publicacion_id;
				$imagen->save();// Guardamos para generar el ID unico en el objeto
				$imagen->img_p = 'fotos/residencia_'.$publicacion_id.'_'.$imagen->id.'_p.'.$img->__get('ext');
				$imagen->img_g = 'fotos/residencia_'.$publicacion_id.'_'.$imagen->id.'_g.'.$img->__get('ext');
				$imagen->save();

				// Formato Grande
				if($img->__get('width') > 800 || $img->__get('height') > 600){
					if($img->__get('height') > $img->__get('width')){
						$relacion = Image::WIDTH;
					}else{
						$relacion = Image::HEIGHT;
					}
					$img->resize(800, 600, $relacion);
				}
				$img->save($imagen->img_g);

				// Formato Pequeño
				$img = Image::factory($filename);
				if($img->__get('width') > IMG_MINI_ANCHO || $img->__get('height') > IMG_MINI_ALTO){
					if($img->__get('height') > $img->__get('width')){
						$relacion = Image::WIDTH;
					}else{
						$relacion = Image::HEIGHT;
					}
					$img->resize(IMG_MINI_ANCHO, IMG_MINI_ALTO, $relacion)
						->quality(72);
				}
				$img->save($imagen->img_p);
				

				// Remove the temporary file
				unlink($filename);
		 }
			$exito = true;
		}

		return $exito;
	}

	public function eliminar($imagen_id){
		$this->auto_render = FALSE;
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE), MSJ_COMPLETAR_REGISTRO);

		$imagen = ORM::factory('imagen', $imagen_id);
		$publicacion = $imagen->publicacion;

		// Borramos la imagen grande
		if (!unlink($imagen->img_g)){
			echo 'No se pudo borrar del disco: '.$imagen->img_g;
		}
		// Borramos la imagen pequeña
		if (!unlink($imagen->img_p)){
			echo 'No se pudo borrar del disco: '.$imagen->img_p;
		}
		// Borramos el registro de la BD
		$imagen->delete();
		
		header("Location: " . url::site('imagen/agregar/'.$publicacion->id));
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

	public function todas(){

		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN), MSJ_INICIAR_SESION);

		$this->template->titulo = "Lista de imagenes";

		$vista = new View('imagen/todas');

		$imagenes = ORM::factory('imagen');
		//Comienza a prepararse la Paginacion
		$paginacion = new Pagination(
		array(
						'uri_segment' => 'pagina',
						'total_items' => $imagenes->count_all(),
						'items_per_page' => 9,
						'style' => 'classic',
		)
		);

		$limit = 9;
		$offset = $paginacion->sql_offset;

		$imagenes = $imagenes
		->orderby('id','DESC')
		->limit($limit)
		->offset($offset)
		->find_all();

		$vista->paginacion = $paginacion;
		$vista->imagenes = $imagenes;

		$this->template->contenido = $vista;
	}
}
?>
