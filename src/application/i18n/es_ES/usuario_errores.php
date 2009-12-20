<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
$lang = array
(
	'correo' => array
	(
		'required' => 'Este campo es requerido.',
		'email' => 'El formato de correo no es v&aacute;lido.',
		'existe' => 'Ya existe en nuestra Base de Datos.',
	),
	'nombre' => array
	(
		'required' => 'Este campo es requerido.',
		'standard_text' => 'Contiene caract&eacute;res inv&aacute;lidos.',
		'length' => 'No debe ser mayor de 45 caracteres.',
	),
	'apellido' => array
	(
		'required' => 'Este campo es requerido.',
		'standard_text' => 'Contiene caract&eacute;res inv&aacute;lidos.',
		'length' => 'No debe ser mayor de 45 caracteres.',
	),
	'clave' => array
	(
		'required' => 'Este campo es requerido.',
		'standard_text' => 'Contiene caract&eacute;res inv&aacute;lidos.',
		'length' => 'Debe escribir entre 4 y 20 caracteres.',
	),
	'login' => array
	(
		'required' => 'Este campo es requerido.',
		'standard_text' => 'Contiene caract&eacute;res inv&aacute;lidos.',
		'length' => 'M&aacute;ximo 45 caracteres.',
		'existe' => 'Ya Est&aacute; siendo utilizado, intente con uno diferente.',
	),
	'telefono' => array
	(
		'phone' => 'No es un tel&eacute;fono v&aacute;lido. ej: XXXX-XXX.XX.XX',
	),
);
?>