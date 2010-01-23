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

}
?>