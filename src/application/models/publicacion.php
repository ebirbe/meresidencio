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
		'' => 'Seleccione...',
		'Mixto' => 'Mixto',
		'Masculino' => 'Masculino',
		'Femenino' => 'Femenino',
	);

	/**
	 * Genera el combobox con la lista de los tipos de sexo
	 * @param int $selected permite seleccionar por defecto el id enviado
	 * @return string retorna el combobox
	 */
	public static function combobox_sexo($selected = NULL){
		return form::dropdown('sexo', Publicacion_Model::$sexo_lista, $selected);
	}

	public function aleatorias(){
		return $this->where('activo', true)->orderby(NULL, 'RAND()')->limit(2)->find_all();
	}

	public function sumar_visita(){
		if($this->id > 0){
			$this->visitas += 1;
			$this->save();
		}
	}
}
?>