<?php 
	include 'funciones.php';
	session_start();  
	$Afiliado = $_SESSION['Afiliado'];	// se recupera el nº de afiliado
		
	if( !$Afiliado || strlen($Afiliado) == 0 ) die("<br /><h1> Debes estar conectado para ver esta pagina !!</h1><br /></div></body></html>");

//Get the row ID to delete!
$table = $_GET['Tabla'];
$ID_name = $_GET['ID-name'];
$ID = $_GET['ID'];

//echo "$ID_name = $ID";

// connect to the mysql database server.
$db=db_connect();

//Set the query to return names of all employees
$query = "DELETE FROM ".$table." WHERE ".$ID_name." = '".$ID."';";

//Run the query
$result = mysql_query($query) or die(mysql_error());

//link variable is equal to the referring page
$link = $_SERVER['HTTP_REFERER'];
//sends a header directly to the browser telling it to redirect the user to the referring page
header("Location: $link");

?>