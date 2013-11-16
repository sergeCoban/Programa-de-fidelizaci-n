<?php session_start() ?>
<?php include 'funciones.php'; ?>

<?php //uso de la funcion verificar_usuario()
if (verificar_usuario()){

	include 'header.php'; 
	//si el usuario es verificado puede acceder al contenido permitido a el
?>


<div id="main">

	<div id="left">
		<p>Hola <a><?php echo $_SESSION['Contacto']?>, bienvenido a tu página personal.</a></p>
		<br/>
		<p id>El saldo actual de tus puntos es de :</p>
		<p id="puntos"><?php echo $_SESSION['Puntos'] ?></p>
		<br/>
		<p> Recuerda que conseguirás más puntos auto-eco con la compra de productos para tus reparaciones.</p>
		<p>Puntos canjeados hasta la fecha : <?php echo $_SESSION['Puntos2'] ?></p>
		<br/>
        
       <div id="centrado">
			<p><a href='afiliado/afiliado_actualizar.php'>Descargar cátalogo de regalos: </a><br/></p>
			<p><a href='afiliado/afiliado_hojasT.php'>Descargar ficha tecnica: </a><br/></p>
			<p><a href='afiliado/afiliado_hojasT.php'>Descargar hoja de producto: </a><br/></p>
			<p><a href='afiliado/afiliado_actualizar.php'>¿Asesoramiento técnico? Llama al 902 22 22 23 o pulsa aquí. </a></p>
			<p></p>
			<p><a href='afiliado/afiliado_actualizar.php'>Accede a tus datos: </a><br/></p>
			<p><a href='salir.php'>Desconectarse </a><br/></p>
       </div>
    </div>


	<span id='izda'>
	<div>
		<h2>Lista de Talleres asignados:</h2>
		<?php dibuja_tabla('signup', $_SESSION['Tipo'], 'Afiliado, Empresa, Contacto, Poblacion, Puntos, Puntos2, Red, Tipo '); 
			  //dibuja_tabla('signup', 'D', 'Afiliado, Empresa, Contacto, Poblacion, Puntos, Puntos2, Red, Tipo ', 'Red = "No"');
		?>
	</div>
	</span>
	<span id="dcha">
		<div id="pub1"></div>
	</span>
	
	<datalist id="lista_tipos">
		<option label="Taller" value="T"></option>
		<option label="Distribuidor" value="D"></option>
		<option label="Super Usuario" value="S"></option>
	</datalist>
<?php
} else {
	//si el usuario no es verificado volvera al formulario de ingreso
	header('Location: index4.php');
}
?>