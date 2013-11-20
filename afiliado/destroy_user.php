<?php

include_once '../funciones.php';
//if (!verificar_usuario()) die();

$db = db_connect();

$usuario =$_REQUEST['Afiliado'];

$sql = "delete from signup where Afiliado=$usuario ";


if( mysql_query($sql, $db) )
{
	echo json_encode(array(
		'success' => true,
		));
} else {
	echo json_encode(array(
		'success' => false,
		'error' => "Error: ".mysql_error()
		));
}

?>