<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Imagen_Controller extends Template_Controller {

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
