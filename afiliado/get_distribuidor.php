<?php

include_once '../funciones.php';

//if (!verificar_usuario()) die();

$db = db_connect();

$rs = mysql_query("select Afiliado AS id, Empresa AS name from signup where Tipo = 'D' order by Empresa",$db);

//$result["total"] = mysql_num_rows($rs);

$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>