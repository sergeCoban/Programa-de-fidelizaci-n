<?php

session_start();  					// siempre iniciar la sesión antes de generar nada en la pagina !
$Afiliado = $_SESSION['Afiliado'];	// se recupera el nº de afiliado
if( !$Afiliado || strlen($Afiliado) == 0) die("<br /><h1>El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area</h1><br /></div></body></html>");
if( $_SESSION['Tipo'] != 'D' and $_SESSION['Tipo'] != 'S') die("<br /><h1>No esta autorizado a acceder a esta area!</h1><br /></div></body></html>");

include_once '../funciones.php';

//if (!verificar_usuario()) die();

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10000000;
$sort = isset($_POST['sort']) ? str_replace( '_fmt', '', strval($_POST['sort']) ): 'Empresa';
$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
$offset = ($page-1)*$rows;

$thisyear = date('Y');

$db = db_connect();

$sql = 	"select s.Afiliado, s.Empresa, s.Tipo, s.Contacto, s.Comercial,"
		     . " s.Puntos_Disponibles, s.Puntos_$thisyear AS Puntos, s.Puntos2, s.Red, s2.Empresa as Red_empresa, s.Comercial, s.Modificado";

$sql .= " from signup as s left join signup as s2 on (s2.Afiliado = s.Red) ";
if( $_SESSION['Tipo'] == 'D') {
	$wherecond = $_SESSION['Afiliado'];
	$sql .= "where s.Red = '".$wherecond."' ";
}

$sql .= "order by s.$sort $order limit $offset,$rows";

$rs = mysql_query($sql,$db);

//$result["total"] = mysql_num_rows($rs);

$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}

if( $result ) {
		echo json_encode($result); 
}
else {
	echo json_encode(array( 
					result => $result,
					sql =>  $sql,
					error => mysql_error()) );
	}

?>