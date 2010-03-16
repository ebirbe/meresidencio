<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Calificacion_Model extends ORM {
	protected $belongs_to = array('usuario', 'publicacion');

	/**
	 * Lista de calificaciones disponibles para las
	 * publicaciones
	 */
	public static $calif_lista = array(
		'' => 'Seleccione...',
	CALIFICACION_NULA => 'Nula',
	CALIFICACION_FALLIDA => 'Fallida',
	CALIFICACION_EXITO => 'Exitosa',
	);

	/**
	 * Genera el combobox con la lista de los tipos de calificaciones
	 * @param int $selected permite seleccionar por defecto el id enviado
	 * @return string retorna el combobox
	 */
	public static function combobox_calificacion($selected = NULL){
		return form::dropdown('puntos', Calificacion_Model::$calif_lista, $selected);
	}

	public static function total($usuario_id){
		$where_cond = array(
			'usuario_id' => $usuario_id,
			'puntos !=' => CALIFICACION_NULA,
		);
		$calificaiones = ORM::factory('calificacion')
		->where($where_cond);
		return $calificaiones->count_all();
	}
	public static function contar_calificacion($usuario_id, $puntos){
		$calificaiones = ORM::factory('calificacion')
		->where('usuario_id', $usuario_id)
		->where('puntos', $puntos);
		return $calificaiones->count_all();
	}
	public static function porcentaje_calificacion($usuario_id, $puntos){
		$calificacion = Calificacion_Model::contar_calificacion($usuario_id,$puntos);
		$total = Calificacion_Model::total($usuario_id);
		if($total == 0) return 0;
		/**
		 * total ---------------- 100%
		 * calificacion --------- X
		 */
		return ($calificacion * 100) / $total;
	}
	public static function total_contar($usuario_id){
		$nulo = Calificacion_Model::contar_calificacion($usuario_id, CALIFICACION_NULA);
		$exito = Calificacion_Model::contar_calificacion($usuario_id, CALIFICACION_EXITO);
		$fallo = Calificacion_Model::contar_calificacion($usuario_id, CALIFICACION_FALLIDA);
		return ($exito + $nulo) - $fallo;
	}
	public static function total_porcentaje($usuario_id){
		$tot_contar = Calificacion_Model::total_contar($usuario_id);
		$total = Calificacion_Model::total($usuario_id);
		if($total == 0) return 0;
		/**
		 * total      ----------- 100%
		 * tot_contar ----------- X
		 */
		return ($tot_contar * 100) / $total;
	}
}
?>