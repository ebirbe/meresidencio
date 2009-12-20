<script>
$(document).ready(function(){
	$("select").change(function(){
		// Vector para saber cuál es el siguiente combo a llenar
		var combos = new Array();
		combos['estado'] = "ciudad";
		combos['ciudad'] = "zona";
		// Tomo el nombre del combo al que se le a dado el clic por ejemplo: país
		posicion = $(this).attr("name");
		// Tomo el valor de la opción seleccionada
		valor = $(this).val();
		if(posicion == 'estado'){
			$("#ciudad").html('	<option value="0" selected="selected">Seleccione...</option>');
			$("#zona").html('	<option value="0" selected="selected">Seleccione...</option>');
		}
		if(posicion == 'ciudad'){
			$("#zona").html('	<option value="0" selected="selected">Seleccione...</option>');
		}
		// Evaluó  que si es país y el valor es 0, vacié los combos de estado y ciudad
		if(posicion == 'estado' && valor=="0"){
			$("#ciudad").html('	<option value="0" selected="selected">Seleccione...</option>');
			$("#zona").html('	<option value="0" selected="selected">Seleccione...</option>');
		}else if(posicion == 'ciudad' && valor=="0"){
			$("#zona").html('	<option value="0" selected="selected">Seleccione...</option>');
		}else{
		/* En caso contrario agregado el letreo de cargando a el combo siguiente
		Ejemplo: Si seleccione país voy a tener que el siguiente según mi vector combos es: estado  por qué  combos [país] = estado
			*/
			$("#"+combos[posicion]).html('<option selected="selected" value="0">Cargando...</option>');
			/* Verificamos si el valor seleccionado es diferente de 0 y si el combo es diferente de ciudad, esto porque no tendría caso hacer la consulta a ciudad porque no existe un combo dependiente de este */
			if(valor != "0" || posicion != 'ciudad'){
			// Llamamos a pagina de combos.php donde ejecuto las consultas para llenar los combos
				$.post(
					"<?php echo url::site('js/llenar_combo_regiones') ?>",
					{
						combo:$(this).attr("name"), // Nombre del combo
						id:$(this).val() // Valor seleccionado
					},
					function(data){
						$("#"+combos[posicion]).html(data);	//Tomo el resultado de pagina e inserto los datos en el combo indicado
					}
				);
			}
		}
	});
});
</script>
