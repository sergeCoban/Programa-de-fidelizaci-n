<?php session_start() ?>
<?php include '../header.php'; ?>
<?php include '../funciones.php'; ?>


<?php //uso de la funcion verificar_usuario()
if (verificar_usuario()){

	//si el usuario es verificado puede acceder al contenido permitido a el
?>


<div id="main">

	<div id="left3">
		<p>Hola <a><em><?php echo $_SESSION['Contacto']?></em>, <br>
      bienvenido a tu página personal.</a></p>
		<br/>
		<p id="subtitle">Listado de Talleres afiliados al programa de Fidelidad Autoeco.</p>
		<br/>
        
        <?php dibuja_tabla('signup', 'S', 'Afiliado, Empresa, Contacto, Poblacion, Tipo, Red, Puntos, Puntos2, Fechaalta, Modificado', 
        								  'Afiliado, Empresa, Contacto, Población, Tipo, Red, Puntos Acumulados, Canjeados, Alta, Modificado',
        								  'H,V,V,V,V,V,E,E,V,V'); ?>
        
       <br />
       <div id="inferior">
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Descargar cátalogo<br>
		    de regalos: </a></div>
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Actualice sus datos</a></div>
			<p><a href='../salir.php'>Desconectarse </a><br/></p>
      </div>
    </div>
       
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
