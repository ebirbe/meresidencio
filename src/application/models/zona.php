<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Zona_Model extends ORM {
	protected $belongs_to = array('ciudad');
	protected $has_many = array('publicaciones', 'alertas', 'usuarios');
	
	protected $sorting = array(
		'nombre' => 'asc',
	);

	/**
	 * Genera el combobox con la lista de las zonas
	 * @param int $selected permite seleccionar por defecto el id enviado
	 * @param int $ciudad_id indica a cual ciudad listar las zonas
	 * @return string retorna el combobox
	 */
	public static function combobox($ciudad_id = NULL, $selected = NULL, $options = NULL){
		$zonas = array();
		$lista=array(
			'0' => 'Seleccione...',
		);
		$op[]= '<option value=0>Seleccione...</option>';
		if($ciudad_id){
			$zonas = ORM::factory('zona')->where('ciudad_id', $ciudad_id)->find_all();
		}
		foreach ($zonas as $zona){
			$lista[$zona->id] = $zona->nombre;
			if($selected == $zona->id) $sel="selected='selected'"; else $sel="";
			$op[] = "<option value='$zona->id'".$sel.">$zona->nombre</option>\n";
		}
		if($options==true){
			return $op;
		}else{
			return form::dropdown('zona', $lista, $selected);
		}
	}
}
?>