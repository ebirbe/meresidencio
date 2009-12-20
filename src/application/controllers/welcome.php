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
		$this->template->titulo = "Inicio";
		
		$contenido = html_Core::anchor('estado', 'Estados').'<br>';
		$contenido .= html_Core::anchor('ciudad', 'Ciudades').'<br>';
		$contenido .= html_Core::anchor('zona', 'Zonas').'<br>';
		$contenido .= html_Core::anchor('tipoinmueble', 'Tipos de Inmueble').'<br>';
		$contenido .= html_Core::anchor('servicio', 'Servicios').'<br>';
		$contenido .= html_Core::anchor('cercania', 'Cercanias').'<br>';
		$contenido .= html_Core::anchor('usuario', 'Usuarios').'<br>';
		$contenido .= html_Core::anchor('publicacion', 'Publicaciones').'<br>';
		
		$this->template->contenido = $contenido;
	}
}