<?php

include_once '../funciones.php';
//if (!verificar_usuario()) die();

$db = db_connect();

$usuario =$_REQUEST['Afiliado'];
$puntos = $_REQUEST['Puntos'];
$puntos2 = $_REQUEST['Puntos2'];
$red	= $_REQUEST['Red'];
$tipo	= $_REQUEST['Tipo'];
$comercial = $_REQUEST['Comercial'];


$thisyear = date('Y');

$sql = "update signup set ";
if(isset($_REQUEST['Comercial'])) $sql .= "Comercial='$comercial', ";
if(isset($_REQUEST['Puntos']) and strlen($puntos)) $sql .= "Puntos_$thisyear=$puntos, ";
if(isset($_REQUEST['Puntos2']) and strlen($puntos2)) $sql .= "Puntos2=$puntos2, ";
if($red) $sql .= "Red='$red', ";
if($tipo) $sql .= "Tipo='$tipo', ";
$sql .= "Puntos_Disponibles = Puntos_2013 + Puntos_2014 + Puntos_2015 + Puntos_2016 + Puntos_2017 + Puntos_2018 + Puntos_2019 + Puntos_2020 - Puntos2, ";
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
		'error' => "Error: ".mysql_error()
		));
}
?>