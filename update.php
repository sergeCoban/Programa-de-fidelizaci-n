<?php 
	include 'funciones.php';
	session_start();  
	$Afiliado = $_SESSION['Afiliado'];	// se recupera el nº de afiliado
		
	if( !$Afiliado || strlen($Afiliado) == 0 ) die("<br /><h1> Debes estar conectado para ver esta pagina !!</h1><br /></div></body></html>");

$table = $_POST['Tabla'];
$ID_name = $_POST['ID-name'];
$ID = $_POST[$ID_name];

$sql_cols=""; $i=0;
foreach($_POST as $key => $val) {
	if( $key == 'Tabla' or $key == 'x' or $key == 'y' or $key == 'ID-name' or $key == $ID_name) continue; 
	
	if($i++) {
		$sql_cols .= ", ";
	}
	
	$sql_cols .= $key ." = '" . mysql_real_escape_string($val) ."'";
	
}

// connect to the mysql database server.
$db=db_connect();

$query = "UPDATE " .$table.
		 " SET " . $sql_cols .
		 " WHERE ".$ID_name." = '".$ID."'";

//Run the query
$result = mysql_query($query) or die(mysql_error());

//link variable is equal to the referring page
$link = $_SERVER['HTTP_REFERER'];
//sends a header directly to the browser telling it to redirect the user to the referring page
header("Location: $link");

?>