<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Tipoinmueble_Model extends ORM {
	protected $has_many = array('publicaciones', 'alertas');
	
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
		$tipos = ORM::factory('tipoinmueble')->find_all();
		foreach ($tipos as $tipo){
			$lista[$tipo->id] = $tipo->nombre;
		}
		return form::dropdown('tipoinmueble', $lista, $selected);
	}
}
?>