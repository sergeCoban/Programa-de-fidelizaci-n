<?php session_start() ?>
<?php include '../header.php'; ?>
<?php include '../funciones.php'; ?>


<?php //uso de la funcion verificar_usuario()
if (verificar_usuario()){

	//si el usuario es verificado puede acceder al contenido permitido a el
?>


<div id="main">

	<div id="left">
		<p>Hola <a><em><?php echo $_SESSION['Contacto']?></em>, <br>
      bienvenido a tu página personal.</a></p>
		<br/>
		<p id>El saldo actual de tus puntos es de:</p>
		<p class="puntos"><?php echo $_SESSION['Puntos'] ?> puntos</p>
		<p></p>
		<p class="p2">Recuerda que conseguirás más puntos<br>
	    auto-eco con la compra de productos <br>
	    para tus reparaciones.</p>
		<p class="p2">Puntos canjeados hasta la fecha:</p>
        <p class="puntos2"><?php echo $_SESSION['Puntos2'] ?> puntos</p>
		<br/>
        
       <div id="centrado">
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Descargar cátalogo<br>
		    de regalos: </a></div>
			<div id=centrado_azul><a href='afiliado_hojasT.php'>Descargar Fichas técnicas: </a></div>
			<div id=centrado_azul><a href='afiliado_hojasP.php'>Descargar Hoja de Producto: </a></div>
			<div id=centrado_azul><a href='afiliado_actualizar.php'>¿Asesoramiento técnico? Llama al 902 22 22 23<br>
		    o pulsa aquí</a></div>
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Actualice sus datos: </a></div>
			<p><a href='../salir.php'>Desconectarse </a><br/></p>
      </div>
    </div>
       
    
<div id="right"><img src="../anuncios/anuncio400x600.png" width="400" height="600" alt="anuncio1"> </div>

<!--	<span id='izda'>
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
	</datalist>-->
   
    
<?php
} else {
	//si el usuario no es verificado volvera al formulario de ingreso
	header('Location: index4.php');
}
?>

<!--end main-->		
</div>


<!--corte-->		

<div id="corte"></div> 

<!--footer-->		

<div id="footer"><p> ©2014 Autoeco, S.L. - <a href="mailto:info@auto-eco.com?subject=Información programa fidelidad Auto-eco">info@auto-eco.es</a></p></div>

<!--end container-->		
</div>

</body>
</html>
