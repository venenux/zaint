<?php

function preparar($cadena)
{
	$cadena = ereg_replace('@sexo_empl', sexo_emp('9737466'), $cadena );
	$cadena = ereg_replace('@nombre_emp', nombre_emp('9737466'), $cadena );

return $cadena;
}

function sexo_emp($cedula) 
{	
	
	$query="select sexo from nompersonal where cedula=$cedula";
	$result=sql_ejecutar($query);	
	$row = mysql_fetch_array ($result);	
	
	return $row[0];
}

function nombre_emp($cedula) 
{	
	
	$query="select apenom from nompersonal where cedula=$cedula";
	$result=sql_ejecutar($query);	
	$row = mysql_fetch_array ($result);	
	
	return $row[0];
}

?>