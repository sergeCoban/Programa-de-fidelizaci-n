<?php

include_once '../funciones.php';

//if (!verificar_usuario()) die();

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 1000000;
$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'Empresa';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
$offset = ($page-1)*$rows;


$db = db_connect();

$rs = mysql_query("select Afiliado, Empresa, Contacto, Puntos, Puntos2, Red, Comercial, DATE_FORMAT(Modificado,'%d/%m/%Y') AS Modificado from signup order by $sort $order limit $offset,$rows",$db);

//$result["total"] = mysql_num_rows($rs);

$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>