<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Cercania_Model extends ORM {
	protected $has_and_belongs_to_many = array('publicaciones');

	protected $sorting = array(
		'nombre' => 'asc',
	);

	/**
	 * Genera el combobox con la lista de los tipos de inmuebles
	 * @param int $selected permite seleccionar por defecto el id enviado
	 * @return string retorna el combobox
	 */
	public static function combobox($selected = NULL){
		$lista=array(
			'0' => 'Seleccione...',
		);
		$cercanias = ORM::factory('cercania')->find_all();
		foreach ($cercanias as $cercania){
			$lista[$cercania->id] = $cercania->nombre;
		}
		return form::dropdown('cercania', $lista, $selected);
	}
}
?>