<?php

defined('SYSPATH') or die('No se permite el acceso directo al script');

class Comentario_Controller extends Controller {

    public function subir()
    {
	if ($_POST['publicacion_id'])
	{
	    $publicacion_id = $_POST['publicacion_id'];

	    $cmt = new Comentario_Model();
	    $cmt->save($_POST);
	    url::redirect("publicacion/detalles/" . $publicacion_id . "#cmt" . $cmt->id);
	}
    }

}
?>
