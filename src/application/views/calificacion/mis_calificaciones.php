<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>

<h2>Mis Calificaciones</h2>
<p>Estas son tus calificaciones, las cuales son otorgadas por los
usuarios una vez que se realiza la operacion de alquiler de una residencia, 
o una vez el cliente considere que no puede culminarla satisfactoriamente. <strong>Cuida tus
calificaciones</strong> ya que a si conservas buenas estadisticas los usuarios
se sentiran mas <strong>interesados</strong> en tus publicaciones.</p>
<?php
$estadisticas = new View('calificacion/estadisticas');
$estadisticas->usuario = $usuario;
echo $estadisticas;
?>