<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php

foreach ($comentarios as $fila)
{
    $cmt = View::factory("comentario/ver");
    $cmt->comentario = $fila;
    echo $cmt;
}
?>