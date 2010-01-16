<?php defined('SYSPATH') or die('No direct script access.'); ?>

2010-01-14 00:04:52 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades' at line 3 - SELECT *, `publicacion`.`id` AS `id`
FROM (`publicaciones`)
JOIN `zonas`, `ciudades`, `estados` ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`) en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-14 00:06:51 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades' at line 3 - SELECT *, `publicaciones`.`id` AS `id`
FROM (`publicaciones`)
JOIN `zonas`, `ciudades`, `estados` ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estados`.`id`)
LIMIT 321, 123 en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
2010-01-14 19:46:14 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Table 'meresidencio.zona' doesn't exist - SELECT `publicaciones`.*
FROM (`publicaciones`)
JOIN (`zona`, `ciudad`) ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id`)
ORDER BY `publicaciones`.`id` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 372
2010-01-14 19:47:51 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'estados' in 'field list' - SELECT `estados`
FROM (`publicaciones`)
JOIN (`zonas`, `ciudades`) ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id`)
ORDER BY `publicaciones`.`id` ASC en el archivo system/libraries/drivers/Database/Mysql.php, linea 372
2010-01-14 20:18:15 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'estado.id' in 'on clause' - SELECT *, COUNT(*) AS `records_found`
FROM (`publicaciones`)
JOIN (`zonas`, `ciudades`, `estados`) ON (`publicaciones`.`zona_id` = `zonas`.`id` AND `zonas`.`ciudad_id` = `ciudades`.`id` AND `ciudades`.`estado_id` = `estado`.`id`)
WHERE `sexo` = '2' en el archivo system/libraries/drivers/Database/Mysql.php, linea 372
2010-01-14 22:49:31 -04:30 --- error: Kohana_404_Exception no capturada: La página que solicitase, publicacion/detalles, no se encuentra. en el archivo system/core/Kohana.php, linea 841
