<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Default Kohana controller. This controller should NOT be used in production.
 * It is for demonstration purposes only!
 *
 * @package    Core
 * @author     Kohana Team
 * @copyright  (c) 2007-2008 Kohana Team
 * @license    http://kohanaphp.com/license.html
 */
class Welcome_Controller extends Template_Controller {

	public function index()
	{
		// Estadisticas WEBOSCOPE
		$this->template->web_zone=WEBO_Z_INDEX;
		$this->template->web_page=WEBO_P_INDEX;
		
		$this->template->titulo = "Inicio";
		$contenido = new View("welcome");
		$contenido->publicaciones_aleatorias = new View('publicacion/aleatorias');
		$contenido->publicaciones_aleatorias->publicaciones = ORM::factory('publicacion')->aleatorias();
		
		$this->template->contenido = $contenido;
	}
}