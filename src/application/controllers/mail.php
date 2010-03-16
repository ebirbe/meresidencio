<?php defined('SYSPATH') or die('No se permite el acceso directo al script');

class Mail_Controller extends Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function ofertar(){
		$publicacion = ORM::factory('publicacion')->orderby(NULL, 'RAND()')->find();
		$vista = new View('mail/ofertar');
		$vista->publicacion = $publicacion;
		echo $vista;
	}
}