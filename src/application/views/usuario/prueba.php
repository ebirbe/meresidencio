<?php defined('SYSPATH') or die('No se permite el acceso directo al script');?>
<html>
<head>
<?php echo html_Core::stylesheet('media/css/test', 'screen', FALSE)?>
<?php echo html_Core::script('media/js/jquery-1.3.2.js', FALSE)?>
<?php echo $cabecera ?>
</head>
<body>
<?php form::open(NULL, array('name'=>'form1'))?>
<?php echo $combo1 ?>
<?php echo $combo2 ?>
<?php echo $combo3 ?>
<?php form::close()?>
</body>
</html>
