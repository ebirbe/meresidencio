<?php defined('SYSPATH') or die('No se permite el acceso directo al script'); ?>
<?php
if(isset($_SESSION['usuario']->login)){
    $nombre = $_SESSION['usuario']->login;
    $disabled = "readonly=readonly";
}else{
    $nombre = NULL;
    $disabled = NULL;
}
?>
<script language="javascript">
    function contar(){
	document.getElementById("cont").innerHTML = 250 - document.fcoment.contenido.value.length;
    }
    function validar(){
	// Limpia los valores en caso de haber errores anteriores
	document.getElementById("msj_nombre").innerHTML = "";
	document.getElementById("msj_contenido").innerHTML = "";

	error = 0;
	//valido el nombre
	if (document.fcoment.nombre.value.length==0){
	    document.fcoment.nombre.focus();
	    document.getElementById("msj_nombre").innerHTML = "Tienes que escribir tu nombre";
	    error++;
	}

	if (document.fcoment.contenido.value.length==0){
	    document.fcoment.contenido.focus();
	    document.getElementById("msj_contenido").innerHTML = "Tienes que escribir algo";
	    error++;
	}

	if (document.fcoment.contenido.value.length > 250){
	    document.fcoment.contenido.focus();
	    document.getElementById("msj_contenido").innerHTML = "El mensaje no puede ser mayor a 250 caracteres";
	    error++;
	}

	if(error){
	    return 0;
	}else{
	    document.fcoment.submit();
	}
    }
</script>
<h2>Comentarios</h2>
<div class="clear"></div>
<?php echo form::open("comentario/subir", array("name" => "fcoment")) ?>
<?php echo form::hidden("ir_a", $_SERVER['PHP_SELF']) ?>
<?php echo form::hidden("publicacion_id", $publicacion->id) ?>
<table class="tabla_ext">
    <tr>
	<td colspan="2"><?php echo form::label("nombre", "Nombre") ?></td>
    </tr>
    <tr>
	<td><?php echo form::input('nombre',$nombre, $disabled) ?></td>
	<td><div class="msg_error" id="msj_nombre"></div></td>
    </tr>
    <tr>
	<td colspan="2"><?php echo form::label("contenido", "Escribe tu comentario <div id='cont'>250</div>") ?></td>
    </tr>
    <tr>
	<td><textarea name="contenido" id="contenido" style="width: 100%;" onkeyup="contar()"></textarea></td>
	<td><div class="msg_error" id="msj_contenido"></div></td>
    </tr>
    <tr>
	<td colspan="2"><input type="button" value="Comentar" onclick="validar()"></td>
    </tr>
</table>
<?php echo form::close() ?>

<?php
$lista = View::factory("comentario/lista");
$lista->comentarios = $publicacion->comentarios;
echo $lista;
?>
