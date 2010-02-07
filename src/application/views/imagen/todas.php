<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<h2>Im&aacute;genes agregadas por los usuarios</h2>
<br>
<?php

$imagen_lista = new View('imagen/lista');
$imagen_lista->imagenes = $imagenes;
$imagen_lista->admin = TRUE;
echo $paginacion;
echo $imagen_lista;
echo $paginacion;
?>