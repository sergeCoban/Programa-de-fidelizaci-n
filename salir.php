<?php
include ('funciones.php');
if (verificar_usuario()){
	//si el usuario es verificado, se elimina los valores,se destruye la sesion y volvemos al formulario de ingreso
	session_unset();
	session_destroy();
	header ('Location:index4.php');
} else {
	//si el usuario no es verificado vuelve al formulario de ingreso
	header ('Location:index4.php');
}
?>
