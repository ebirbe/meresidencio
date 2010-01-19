<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Usuario_Model extends ORM {
	protected $belongs_to = array('estado', 'ciudad', 'zona');
	protected $has_many = array('publicaciones', 'calificaciones', 'alertas');

	/**
	 * Este metodo verifica el acceso de un
	 * usuario a algun modulo.
	 * @param $tipo_permitido
	 */
	public function puede_entrar($tipo_permitido = NULL){
		$permitido = FALSE;

		if($this->tipo == USUARIO_ADMIN){
			//Acceso total
			return TRUE;
		}

		if($this->tipo != NULL){
			//acceso limitado
			if(is_array($tipo_permitido)){
				foreach ($tipo_permitido as $t){
					if($this->tipo == $t) $permitido = TRUE;
					break;
				}
				
			}else if($this->tipo == $tipo_permitido) $permitido = TRUE;
			
		}else{
			//acceso a cualquier usuario
			$permitido = TRUE;
		}

		return $permitido;
	}

	public static function otorgar_acceso($usuario, $tipo_permitido = NULL){
		$permitido = FALSE;

		if(is_a($usuario, 'Usuario_Model')){
			if( $usuario->puede_entrar($tipo_permitido)){
				$permitido = TRUE;
			}
		}

		if(!$permitido) url::redirect('usuario/acceso_denegado');
	}
}
?>