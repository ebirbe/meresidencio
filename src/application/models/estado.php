<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Estado_Model extends ORM {

	protected $has_many = array('ciudades', 'usuarios', 'alertas');
	protected $sorting = array(
		'nombre' => 'asc'
	);

	/**
	 * Genera el combobox con la lista de los estados
	 * @param int $selected permite seleccionar por defecto el id enviado
	 * @return string retorna el combobox
	 */
	public static function combobox($selected = NULL){
		$lista=array(
			'0' => 'Seleccione...',
		);
		$estados = ORM::factory('estado')->find_all();
		foreach ($estados as $estado){
			$lista[$estado->id] = $estado->nombre;
		}
		return form::dropdown('estado', $lista, $selected);
	}
}
?>