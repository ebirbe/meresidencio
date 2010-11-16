<?php

defined('SYSPATH') or die('No se permite el acceso directo al script');

class Comentario_Model extends ORM {

    protected $belongs_to = array('publicacion');
    protected $sorting = array(
		'id' => 'desc',
	);


    public function save($datos)
    {
	$this->nombre = htmlentities($datos['nombre']);
	$this->contenido = htmlentities($datos['contenido']);
	$this->publicacion_id = $datos['publicacion_id'];

	if ($this->nombre != "" && $this->contenido != "")
	{
	    parent::save();
	}
	return $this;
    }

}

?>