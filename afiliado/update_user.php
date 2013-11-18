<?php

include_once '../funciones.php';
//if (!verificar_usuario()) die();

$db = db_connect();

$usuario =$_REQUEST['Afiliado'];
$puntos = $_REQUEST['Puntos'];

$sql = "update signup set Puntos=$puntos, Modificado = sysdate() where Afiliado='$usuario'";
if( mysql_query($sql, $db) )
{
	echo json_encode(array(
		'Afiliado' => $usuario,
		'Puntos' => $puntos,
		'Modificado' => date('d/m/Y')
		));
} else {
	echo json_encode(array(
		'Afiliado' => $usuario,
		'Puntos' => "Error: ".mysql_error()
		));
}
?>