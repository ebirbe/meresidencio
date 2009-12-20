<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Ciudad_Model extends ORM {
	protected $belongs_to = array('estado');
	protected $has_many = array('zonas', 'alertas', 'usuarios');
	
	protected $sorting = array(
		'nombre' => 'asc',
	);

	/**
	 * Genera el combobox con la lista de las ciudades
	 * @param int $selected permite seleccionar por defecto el id enviado
	 * @return string retorna el combobox
	 */
	public static function combobox($estado_id = NULL, $selected = NULL, $options = NULL){
		$ciudades = array();
		$lista=array(
			'0' => 'Seleccione...',
		);
		$op[]= '<option value=0>Seleccione...</option>';
		if($estado_id){
			$ciudades = ORM::factory('ciudad')->where('estado_id', $estado_id)->find_all();
		}
		foreach ($ciudades as $ciudad){
			$lista[$ciudad->id] = $ciudad->nombre;
			if($selected == $ciudad->id) $sel="selected='selected'"; else $sel="";
			$op[] = "<option value='$ciudad->id' ".$sel.">$ciudad->nombre</option>\n";
		}
		if($options==true){
			return $op;
		}else{
			return form::dropdown('ciudad', $lista, $selected);
		}
	}
}
?>