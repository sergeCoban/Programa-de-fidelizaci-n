<?php session_start() ?>
<?php include '../header.php'; ?>
<?php include '../funciones.php'; ?>


<?php //uso de la funcion verificar_usuario()
if (verificar_usuario()){

	//si el usuario es verificado puede acceder al contenido permitido a el
?>


<div id="main">

	<div id="left2">
		<p>Hola <a><em><?php echo $_SESSION['Contacto']?></em>, <br>
      bienvenido a tu página personal.</a></p>
		<br/>
		<p id="subtitle">Listado de Talleres afiliados al programa de Fidelidad Autoeco de tu zona.</p>
		<p>Actualiza sus puntos </p>
		<br/>
        
        <?php dibuja_tabla('signup', 'D', 'Afiliado, Empresa, Contacto, Poblacion, Puntos, Puntos2', 
        								  'Afiliado, Empresa, Contacto, Poblacion, Puntos, Canjeados',
        								  'H,V,V,V,E,V'); ?>
        
       <br />
    </div>
       
<div id="right2"><img src="../anuncios/anuncio190x600.png" width="190" height="600" alt="anuncio1"> </div>
 
<div id="inferior">
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Descargar cátalogo<br>
		    de regalos: </a></div>
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Actualice sus datos</a></div>
			<p><a href='../salir.php'>Desconectarse </a><br/></p>
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
