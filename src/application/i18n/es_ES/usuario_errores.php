<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
$lang = array
(
	'correo' => array
	(
		'required' => 'Este campo es requerido.',
		'email' => 'El formato de correo no es v&aacute;lido.',
		'existe' => 'Ya existe en nuestra Base de Datos.',
		'no_existe' => 'No hay ninguna cuenta de usuario asociada a este correo.',
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
		'alpha_dash' => 'Contiene caract&eacute;res inv&aacute;lidos.',
		'length' => 'M&aacute;ximo 45 caracteres.',
		'existe' => 'Ya Est&aacute; siendo utilizado, intente con uno diferente.',
	),
	'telefono' => array
	(
		'required' => 'Este campo es requerido.',
		'phone' => 'No es un tel&eacute;fono v&aacute;lido. ej: XXXX-XXX.XX.XX',
	),
	//Para la clave actual en el cambio de clave
	'actual' => array
	(
		'required' => 'Este campo es requerido.',
		'clave_incorrecta' => 'Clave de usuario incorrecta.'
	),
	'nueva' => array
	(
		'required' => 'Este campo es requerido.',
		'standard_text' => 'Contiene caract&eacute;res inv&aacute;lidos.',
		'length' => 'Debe escribir entre 4 y 20 caracteres.',
	),
	'confirmacion' => array
	(
		'required' => 'Este campo es requerido.',
		'no_coincide' => 'La clave nueva y la confirmaci&oacute;n deben ser id&eacute;nticas.'
	),
	'captcha' => array
	(
		'required' => 'Este campo es requerido.',
		'valid' => 'El texto que introdujo no coincide.'
	),
);
?>