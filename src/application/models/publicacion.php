<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Publicacion_Model extends ORM {
	protected $has_many = array('imagenes','calificaciones');
	protected $belongs_to = array('usuario', 'zona', 'tipoinmueble');
	protected $has_and_belongs_to_many = array('cercanias', 'servicios');

	/**
	 * Lista de sexo disponibles para las
	 * residencias, este campo debe coincidir
	 * con el campo ENUM() de la base de datos
	 * en la columna imagenes.sexo
	 */
	public static $sexo_lista = array(
		'Mixto',
		'Masculino',
		'Femenino',
	);

	/**
	 * Genera el combobox con la lista de los tipos de sexo
	 * @param int $selected permite seleccionar por defecto el id enviado
	 * @return string retorna el combobox
	 */
	public static function combobox_sexo($selected = NULL){
		return form::dropdown('sexo', Publicacion_Model::$sexo_lista, $selected);
	}
}
?>