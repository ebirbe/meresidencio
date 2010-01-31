<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Notificacion_Model {

	protected $usuario;
	protected $calificaciones;
	protected $publicaciones;
	
	public function __construct($usuario){
		$this->usuario = $usuario;
		$this->calificaciones = $usuario->calificaciones;
		$this->publicaciones = $usuario->publicaciones;
	}
	public function falta_perfil(){
		if($this->usuario->tipo == USUARIO_COMUN){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function han_ofertado(){
		$lista = array();
		foreach ($this->calificaciones as $calif){
			if($calif->razon == "" && $calif->respuesta == ""){
				$lista[] = $calif->publicacion;
			}
		}
		return $lista;
	}

	public function han_calificado(){
		$pendientes = array();
		foreach ($this->calificaciones as $calif){
			if($calif->razon != "" && $calif->respuesta == "" ){
				$pendientes[] = $calif;
			}
		}
		return $pendientes;
	}
	
	public function componer_notificaiones(){
		
		$notificaciones = array();
		
		if($this->falta_perfil()){
			$notificaciones[] = "Completa <a href='".url::site("usuario/editar/".$this->usuario->id)."'>tu perfil</a> de usuario.";
		}
		
		foreach ($this->han_ofertado() as $publicacion){
			$notificaciones[] = "Alguien se ha intersado por tu <a href='".url::site("publicacion/detalles/".$publicacion->id)."'>publicaci&oacute;n #$publicacion->id</a>.";
		}
		
		foreach ($this->han_calificado() as $calificacion){
			$notificaciones[] = "Han calificado tu <a href='".url::site("publicacion/detalles/".$calificacion->publicacion_id)."'>publicaci&oacute;n #$calificacion->publicacion_id</a>. <a href='".url::site("calificacion/responder_calificacion/".$calificacion->id)."'>Responde</a> a esta calificaci&oacute;n.";
		}
		
		return $notificaciones;
	}
}
?>