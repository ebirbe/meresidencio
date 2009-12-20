<?php defined('SYSPATH') or die('No direct script access.'); ?>

2009-12-12 00:00:25 -04:30 --- error: PHP Error no capturada: Missing argument 1 for Publicacion_Controller::lista() en el archivo application/controllers/publicacion.php, linea 185
2009-12-12 17:41:46 -04:30 --- error: Kohana_Database_Exception no capturada: Ocurrió un error de SQL: Unknown column 'estado' in 'where clause' - SELECT COUNT(*) AS `records_found`
FROM (`publicaciones`)
WHERE `estado` = '6'
AND `ciudad` = '0'
AND `zona` = '0'
AND `tipoinmueble` = '0'
AND `submit` = 'Buscar' en el archivo system/libraries/drivers/Database/Mysql.php, linea 371
