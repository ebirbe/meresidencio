<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Servicio_Model extends ORM {
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
		$servicios = ORM::factory('servicio')->find_all();
		foreach ($servicios as $servicio){
			$lista[$servicio->id] = $servicio->nombre;
		}
		return form::dropdown('servicio', $lista, $selected);
	}
}
?>