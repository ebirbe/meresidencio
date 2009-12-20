<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
/**
 * Esta clase es para contener todas los metodos encargados
 * de responder las solicitudes ajax de JQuery
 * @author erick
 *
 */
class Js_Controller extends Controller {
	/**
	 * Devuelve los datos solicitados por los
	 * combobox de estado, ciudad y zona
	 */
	public function llenar_combo_regiones() {

		if(request::is_ajax()){
			$this->auto_render = FALSE;

			switch ($_POST['combo']) {
				case 'estado':
					foreach (Ciudad_Model::combobox($_POST['id'],NULL,TRUE) as $value) {
						echo $value;
					}
					break;

				case 'ciudad':

					foreach (Zona_Model::combobox($_POST['id'],NULL,TRUE) as $value) {
						echo $value;
					}
					break;
			}
		}
	}
}
?>