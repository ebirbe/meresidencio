#!/bin/bash -e

function cambiar {
	
	#echo "Encontrado $1"
	
	if [ -f $1 ];
	then
		chmod 644 $1
		echo "Permisos Cambiados! $1"
	else
		echo "Advertencia: $1 No es un archivo"
	fi
}

function recorrer {
	
	#echo "Entrando en $1"
	
	for archivo in `ls $1`;
	do
		NUEVA_RUTA="$1/"${archivo}
		
		if [ -d ${NUEVA_RUTA} ];
		then
			recorrer ${NUEVA_RUTA}
		else
			cambiar ${NUEVA_RUTA}
		fi
	done
}

echo "Iniciando..."

RUTA=$1

if [ "$1" = "" ];
then
	RUTA="."
fi

echo "Ahora RUTA = ${RUTA}"

recorrer "${RUTA}"
