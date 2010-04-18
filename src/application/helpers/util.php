<?php defined('SYSPATH') or die('No direct script access.');

class util_Core {

	public static function limpiar_html($string)
	{
		$str_limpia = str_replace("<", "&lt;", $string);
		$str_limpia = str_replace(">", "&gt;", $str_limpia);
		return $str_limpia;
	}

	public static function ensuciar_html($string)
	{
		$str_sucia = str_replace("&lt;", "<", $string);
		$str_sucia = str_replace("&gt;", ">", $str_sucia);
		return $str_sucia;
	}
}

?>