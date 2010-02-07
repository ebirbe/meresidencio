<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Notificacion_Controller extends Template_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->template->titulo = html::specialchars("Administracion de Notificaciones");
	}
	public function mostrar(){
		//Control de acceso
		Usuario_Model::otorgar_acceso($this->session->get('usuario'), array(USUARIO_ADMIN, USUARIO_VENDE, USUARIO_COMUN), MSJ_INICIAR_SESION);
		$usuario = $this->session->get('usuario');
		$vista = new View('notificacion/mostrar');
		$m_notif = new Notificacion_Model($usuario);
		$vista->notificaciones = $m_notif->componer_notificaiones();
		$this->template->contenido = $vista;
	}
}
?>