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
				$lista[] = $calif;
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

	public function puedes_calificar(){
		$lista = array();
		$db = new Database();
		foreach ( $db->query("SELECT id, razon, publicacion_id AS publicacion FROM calificaciones WHERE cliente_id=".$this->usuario->id) as $calif){
			if($calif->razon == ""){
				$lista[] = "Puedes <a href='".url::site('calificacion/calificar/'.$calif->id)."'>calificar</a> tu <a href='".url::site('publicacion/ofertar/'.$calif->publicacion)."'>solicitud #$calif->id</a> de alquiler.";
			}
		}
		return $lista;
	}

	public function componer_notificaiones(){

		$notificaciones = array();

		if($this->falta_perfil()){
			$notificaciones[] = "Completa <a href='".url::site("usuario/editar/".$this->usuario->id)."'>tu perfil</a> de usuario.";
		}

		foreach ($this->puedes_calificar() as $calificacion){
			$notificaciones[] = $calificacion;
		}
		
		foreach ($this->han_ofertado() as $calificacion){
			$cliente = new Usuario_Model($calificacion->cliente_id);
			$notificaciones[] = "$cliente->login se ha intersado por tu <a href='".url::site("publicacion/detalles/".$calificacion->publicacion->id)."'>publicaci&oacute;n #".$calificacion->publicacion->id."</a>.";
		}

		foreach ($this->han_calificado() as $calificacion){
			$notificaciones[] = "Han calificado tu <a href='".url::site("publicacion/detalles/".$calificacion->publicacion_id)."'>publicaci&oacute;n #$calificacion->publicacion_id</a>. <a href='".url::site("calificacion/responder_calificacion/".$calificacion->id)."'>Responde</a> a esta calificaci&oacute;n.";
		}

		return $notificaciones;
	}
}
?>