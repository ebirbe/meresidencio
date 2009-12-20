<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Alerta_Model extends ORM {
	protected $belongs_to = array('usuario', 'estado', 'ciudad', 'zona', 'tipoinmueble');
}
?>