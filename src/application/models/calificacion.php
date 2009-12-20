<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Calificacion_Model extends ORM {
	protected $belongs_to = array('usuario', 'publicacion');
}
?>