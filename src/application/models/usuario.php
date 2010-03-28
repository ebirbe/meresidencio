<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Usuario_Model extends ORM {
	protected $belongs_to = array('estado', 'ciudad', 'zona');
	protected $has_many = array('publicaciones', 'calificaciones', 'alertas');

	/**
	 * Confirmacion de los datos recibidos por el link del correo
	 * @param unknown_type $string_MD5
	 */
	public function confirmar($string_MD5){
		if($this->id > 0 &&					//Si el usuario existe
		$this->confirmado == FALSE &&		//y no se ha confirmado
		md5($this->login) == $string_MD5){	//Y su login en MD5 concuerda con el MD5 recibido
			$this->confirmado = TRUE;
			$this->save();
			return TRUE;					//Se confirma el correo del usuario
		}
		return FALSE;						// Sino, no hubo exito
	}

	/**
	 * Este metodo verifica el acceso de un
	 * usuario a algun modulo.
	 * @param $tipo_permitido
	 */
	public function puede_entrar($usuario, $tipo_permitido = NULL){
		$permitido = FALSE;

		if($usuario->tipo == USUARIO_ADMIN){
			//Acceso total
			return TRUE;
		}

		if($tipo_permitido != NULL){
			//acceso limitado
			if(is_array($tipo_permitido)){
				foreach ($tipo_permitido as $t){
					if($usuario->tipo == $t){
						$permitido = TRUE;
						break;
					}
				}

			}else if($usuario->tipo == $tipo_permitido) $permitido = TRUE;

		}else{
			//acceso a cualquier usuario
			$permitido = TRUE;
		}

		return $permitido;
	}

	public static function otorgar_acceso($usuario, $tipo_permitido = NULL, $mensaje_id = 0){
		$permitido = FALSE;

		if(is_a($usuario, 'Usuario_Model')){
			if( $usuario->puede_entrar($usuario, $tipo_permitido)){
				$permitido = TRUE;
			}
		}

		if(!$permitido) url::redirect('usuario/acceso_denegado/'.$mensaje_id);
	}

	public function es_propio($propietario_id){
		if($this->id == $propietario_id){
			return TRUE;
		}elseif($this->tipo == USUARIO_ADMIN){
			//Acceso al administrador
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>