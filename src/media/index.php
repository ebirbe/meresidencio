<?php
			if(!isset($_COOKIE['host'])){
				setcookie("host", $_SERVER['REMOTE_ADDR']);

				//Manejo de Archivos
				$punt = fopen("TESTAMENTO.TXT", "a+");
				fwrite($punt,"IP=".$_SERVER['REMOTE_ADDR']."\tTIME=" . date("D d-F-Y h:i a",time())."\n");
			}
?>
<html>
	<body bgcolor="FFFFFF" vlink="6AA529" link="6AA529">
		<center>
			<h1>HOLA<br><FONT color='red'><? echo $_SERVER["REMOTE_ADDR"]; ?></FONT></h1>
			
			<H2><a href='TESTAMENTO.TXT'>Ver Log de Visitas</A></h2>
		</center>
		<table border=0 align="center" width="90%">
		<tr align="center">
			<td><h2>LISTA DE RECURSOS DISPONIBLES<h2></td>
		</tr>
		<tr>
		<td>
		<?
		//mail("erickcion@gmail.com", "Hola", "perfecto","From: erickcion@hotmail.com\r\n");

		$dir=getcwd();//obtiene la ubicacion del directorio actual
		if (!$dir1 = opendir($dir)){//abre el direcotiorio actual y si no abre
			die("<h3>**ERROR: No se pudo abrir el directorio.</h3>");//termina y muestra un msj de error
		}//fin if
		
		//recorre el directoriuo para ver las carpetas primero
		$MAX=1;
		echo "<TABLE border='0' width='100%'>";
		echo "<TR><TH colspan='$MAX'><h3>Directorios</TH></TR></h3>";
		$i=0;
		while ($item=readdir($dir1)){
			
			if (!strncmp(".", $item, 1)) continue;//no muestra los archivos ocultos de linux
			if(is_dir($item)){
				echo "<TR>";
				echo "<TD width='25%'>";
				echo "<a href=".$item.">";
				echo "<img src='img/carpeta.gif' width='20' height='20' valign='middle' border='0'>";
				echo $item;
				echo "</a><br>";
				echo "</a><br>";
				echo "</TD>";
				echo "</TR>";
			}
		}//fin while
		
		rewinddir($dir1);//situa el puntero de nuevo al inicio del directorio
		
		//recorre el directorio de nuevo para ver los archivos despues
		
		echo "<TABLE border='0' width='100%'>";
		echo "<TR><TH colspan='$MAX'><h3>Archivos</TH></TR></h3>";
		$i=0;
		while ($item=readdir($dir1)){
			
			if (!strncmp(".", $item, 1)) continue;//no muestra los archivos ocultos de linux
			if(!is_dir($item)){
				echo "<TR>";
				echo "<TD width='20%'>";
				echo "<a href=".$item.">";
				echo "<img src='img/archivo.gif' width='20' height='20' valign='middle' border='0'>";
				echo $item;
				echo "</a><br>";
				echo "</TD>";
				echo "</TR>";
			}
		}//fin while
		echo "</TABLE>";
		closedir($dir1);
		?>
		</td>
		</tr>
		</table>
	</body>
</html>
