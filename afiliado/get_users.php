<?php

include_once '../funciones.php';

//if (!verificar_usuario()) die();

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 1000000;
$sort = isset($_POST['sort']) ? str_replace( '_fmt', '', strval($_POST['sort']) ): 'Empresa';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
$offset = ($page-1)*$rows;


$db = db_connect();

$rs = mysql_query("select s.Afiliado, s.Empresa, s.Tipo, s.Contacto, s.Puntos, s.Puntos2, s.Red, s2.Empresa as Red_empresa, s.Comercial, s.Modificado 
from signup as s left join signup as s2 on (s2.Afiliado = s.Red) order by s.$sort $order limit $offset,$rows",$db);

//$result["total"] = mysql_num_rows($rs);

$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

echo json_encode($result);

?>