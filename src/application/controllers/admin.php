<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Admin_Controller extends Template_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Modulo de Administracion");
	}

	public function index(){
		
		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_ADMIN;
		$this->template->web_page=WEBO_P_ADMIN_INICIO;
		
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN), MSJ_INICIAR_SESION);
		
		$vista = new View('admin/index');
		$usuario = $this->session->get('usuario');
		$publicacion = ORM_Core::factory('publicacion')
		->where('activo', TRUE)
		->limit(2)
		->orderby('id','DESC')
		->find_all();
		
		$usuario_tabla = ORM::factory('usuario')
		->limit(2)
		->orderby('id','DESC')
		->find_all();
		
		$imagenes = ORM::factory('imagen')
		->limit(3)
		->orderby('id','DESC')
		->find_all();
		
		$vista->usuario = $usuario;
		$vista->publicacion = $publicacion;
		$vista->usuario_tabla = $usuario_tabla;
		$vista->imagenes = $imagenes;
		$this->template->contenido = $vista;
	}
}