<?php defined('SYSPATH') or die('No se permite el acceso directo al script');
$lang = array
(
	'telefono' => array
	(
		'required' => 'Este campo es requerido.',
		'phone' => 'No es un tel&eacute;fono v&aacute;lido. ej: XXXX-XXX.XX.XX',
	),
	'tipoinmueble' => array
	(
		'required' => 'Este campo es requerido.',
	),
	'estado' => array
	(
		'required' => 'Este campo es requerido.',
	),
	'ciudad' => array
	(
		'required' => 'Este campo es requerido.',
	),
	'zona' => array
	(
		'required' => 'Este campo es requerido.',
	),
	'sexo' => array
	(
		'required' => 'Este campo es requerido.',
	),
	'direccion' => array
	(
		'standard_text' => 'Contiene caract&eacute;res inv&aacute;lidos.',
		'length' => 'No debe ser mayor de 45 caracteres.',
	),
	'habitaciones' => array
	(
		'required' => 'Este campo es requerido.',
		'numeric' => 'Solo puede escribir numeros.',
	),
	'mts' => array
	(
		'numeric' => 'Solo puede escribir numeros.',
	),
	'precio' => array
	(
		'required' => 'Este campo es requerido.',
		'numeric' => 'Solo puede escribir numeros.',
	),
	'deposito' => array
	(
		'numeric' => 'Solo puede escribir numeros.',
	),
);
?>