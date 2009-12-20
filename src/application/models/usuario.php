<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Usuario_Model extends ORM {
	protected $belongs_to = array('estado', 'ciudad', 'zona');
	protected $has_many = array('publicaciones', 'calificaciones', 'alertas');
}
?>