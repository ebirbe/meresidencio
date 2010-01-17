<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
class Imagen_Model extends ORM {
	protected $belongs_to = array('publicacion');

	public static function guardar_imagen($datos, $id_pu){

		//Comienza el procesamiento de las imagenes
		$procesar = FALSE;
		$mime = $datos["type"];

		switch ($mime) {

			//procesa las Imagenes PNG
			case "image/png":
				$tmp_img = imagecreatefrompng($datos['tmp_name']);
				ob_start();
				imagepng($tmp_img);
				$procesar = TRUE;
				break;

				//procesa las Imagenes JPG
			case "image/jpeg":
				$tmp_img = imagecreatefromjpeg($datos['tmp_name']);
				ob_start();
				imagejpeg($tmp_img);
				$procesar = TRUE;
				break;

				//procesa las Imagenes GIF
			case "image/gif":
				$tmp_img = imagecreatefromgif($datos['tmp_name']);
				ob_start();
				imagegif($tmp_img);
				$procesar = TRUE;
				break;
		}

		//Termina de procesar las imagenes y las guarda en la base de datos
		if($procesar == TRUE){
			$archivo = ob_get_contents();
			ob_end_clean();
			$img_campo = new Imagen_Model();
			$img_campo->imagen = $archivo;
			$img_campo->mime = $mime;
			$img_campo->publicacion_id = $id_pu;
			$img_campo->save();
		}

	}
	
	public static function generar_imagen($id, $imprimir = TRUE){
		$link = mysql_connect('localhost', 'root', 'acer');
		if (!$link) die('Error al conectarse con MySQL: ' . mysql_error().' <br>Número del error: '.mysql_errno());
		if (! @mysql_select_db("meresidencio",$link)){
			echo "No se pudo conectar correctamente con la Base de datos";
			exit();
		}
		$mime = ORM::factory('imagen', $id)->mime;
		$result = mysql_query("SELECT imagen FROM imagenes WHERE id=$id");
		$result_array = mysql_fetch_array($result);

		if($imprimir){
			header("Content-Type: $mime");
			echo $result_array[0];
		}else{
			return $result_array[0];
		}
	}
}
?>