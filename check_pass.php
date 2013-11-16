<?php
include 'funciones.php';
//usuario y clave pasados por el formulario
	$Afiliado = $_POST['Afiliado'];
	$Password = $_POST['Password'];

//usa la funcion conexiones() que se ubica dentro de funciones.php
if (conexiones($Afiliado, $Password)){

	switch($_SESSION['Tipo']) 
	{
		case "T":
			header('Location: ./afiliado/menu_taller.php');
			break;
		case "D":
			header('Location: ./afiliado/menu_distribuidor.php');
			break;
		case "S":
			header('Location: ./afiliado/menu_admin.php');
			break;
		default:
			die("<p class='warning' >Error inesperado: Tipo de usuario invalido ( ".$_SESSION['Tipo']." )</p>");
			
	}

} else {
	//si no es valido volvemos al formulario inicial
	header('Location: index4.php');
}
?>
