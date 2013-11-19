<?php

include_once '../funciones.php';
//if (!verificar_usuario()) die();

$db = db_connect();

$usuario =$_REQUEST['Afiliado'];
$puntos = $_REQUEST['Puntos'];
$puntos2 = $_REQUEST['Puntos2'];
$red	= $_REQUEST['Red'];
$tipo	= $_REQUEST['Tipo'];


$sql = "update signup set ";
if(isset($_REQUEST['Puntos']) and strlen($puntos2)) $sql .= "Puntos=$puntos, ";
if(isset($_REQUEST['Puntos2']) and strlen($puntos2)) $sql .= "Puntos2=$puntos2, ";
if($red) $sql .= "Red='$red', ";
if($tipo) $sql .= "Tipo='$tipo', ";
$sql .= "Modificado = sysdate() where Afiliado='$usuario'";


if( mysql_query($sql, $db) )
{
	echo json_encode(array(
		'Afiliado' => $usuario,
		'Puntos' => $puntos,
		'Modificado' => date('d/m/Y')
		));
} else {
	echo json_encode(array(
		'Afiliado' => $sql,
		'Puntos' => "Error: ".mysql_error()
		));
}
?>