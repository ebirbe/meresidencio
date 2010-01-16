<?php defined('SYSPATH') or die('No direct script access.'); ?>

2010-01-13 19:11:35 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'estado.id' in 'where clause' - SELECT COUNT(*) AS `records_found`
FROM (`publicaciones`)
WHERE `estado`.`id` = ''
OR `ciudad`.`id` = ''
OR `zona` = ''
OR `tipoinmueble_id` = ''
OR `sexo` = '' en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 19:16:22 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'estado_id' in 'where clause' - SELECT COUNT(*) AS `records_found`
FROM (`publicaciones`)
WHERE `estado_id` = ''
OR `ciudad_id` = ''
OR `zona` = ''
OR `tipoinmueble_id` = ''
OR `sexo` = '' en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 19:25:22 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '' at line 3 - SELECT COUNT(*) AS `records_found`
FROM (`publicaciones`)
WHERE  en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 20:20:09 -04:30 --- error: Kohana_Exception no capturada: La propiedad find no existe en la clase Publicacion_Model. en el archivo system/libraries/ORM.php, linea 364
2010-01-13 21:58:53 -04:30 --- error: Kohana_Exception no capturada: No esta permitido utilizar metodos de Query mediante ORM. en el archivo system/libraries/ORM.php, linea 200
2010-01-13 21:59:06 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'zona.ciudad_id' in 'on clause' - SELECT `zonas`.*
FROM (`zonas`)
JOIN `ciudades` ON (`zona`.`ciudad_id` = `ciudades`.`id`)
ORDER BY `zonas`.`nombre` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 22:02:29 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Table 'meresidencio.ciudades, estados' doesn't exist - SELECT `zonas`.*
FROM (`zonas`)
JOIN `ciudades, estados` ON (`zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `zonas`.`nombre` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 22:09:12 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'estados.id' in 'on clause' - SELECT `zonas`.*
FROM (`zonas`)
JOIN `ciudades` ON (`zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `zonas`.`nombre` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 22:37:14 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'estados.id' in 'on clause' - SELECT `zonas`.*
FROM (`zonas`)
JOIN `ciudades` ON (`zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `zonas`.`nombre` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 22:42:47 -04:30 --- error: Kohana_Exception no capturada: No esta permitido utilizar metodos de Query mediante ORM. en el archivo system/libraries/ORM.php, linea 200
2010-01-13 22:46:25 -04:30 --- error: Kohana_Exception no capturada: La propiedad db no existe en la clase Zona_Model. en el archivo system/libraries/ORM.php, linea 364
2010-01-13 22:49:11 -04:30 --- error: Kohana_Exception no capturada: Método inválido db llamado en Zona_Model. en el archivo system/libraries/ORM.php, linea 257
2010-01-13 23:00:57 -04:30 --- error: PHP Error no capturada: Missing argument 1 for Publicacion_Controller::prueba() en el archivo application/controllers/publicacion.php, linea 247
2010-01-13 23:06:51 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades' at line 3 - SELECT `publicaciones`.*
FROM (`publicaciones`)
JOIN `zonas`, `ciudades`, `estados` ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `publicaciones`.`id` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 23:08:12 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades' at line 3 - SELECT `publicaciones`.*
FROM (`publicaciones`)
JOIN `zonas`, `ciudades`, `estados` ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `publicaciones`.`id` ASC
LIMIT 0, 1 en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 23:08:28 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades' at line 3 - SELECT `publicaciones`.*
FROM (`publicaciones`)
JOIN `zonas`, `ciudades`, `estados` ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `publicaciones`.`id` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 23:17:29 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades' at line 3 - SELECT `publicaciones`.*
FROM (`publicaciones`)
JOIN `zonas`, `ciudades`, `estados` ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `publicaciones`.`id` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 23:20:50 -04:30 --- error: Kohana_Exception no capturada: Método inválido zona llamado en Publicacion_Model. en el archivo system/libraries/ORM.php, linea 257
2010-01-13 23:28:08 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'ciudades.id' in 'where clause' - SELECT `estados`.*
FROM (`estados`)
WHERE `ciudades`.`id` = 1
AND `estados`.`id` = 0
ORDER BY `estados`.`nombre` ASC
LIMIT 0, 1 en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 23:31:09 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades' at line 3 - SELECT `publicaciones`.*
FROM (`publicaciones`)
JOIN `zonas`, `ciudades`, `estados` ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
ORDER BY `publicaciones`.`id` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-13 23:38:52 -04:30 --- error: PHP Error no capturada: preg_match() expects parameter 2 to be string, array given en el archivo system/libraries/drivers/Database/Mysql.php, linea 135
2010-01-13 23:55:59 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'publicacion.id' in 'field list' - SELECT *, `publicacion`.`id` AS `id` 
		FROM (`publicaciones`) JOIN (
		`zonas` , `ciudades` , `estados`
		) ON ( `publicaciones`.`zona_id` = `zonas`.`id`
		AND `zonas`.`ciudad_id` = `ciudades`.`id`
		AND `ciudades`.`estado_id` = `estados`.`id` )
		ORDER BY `publicaciones`.`id` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
