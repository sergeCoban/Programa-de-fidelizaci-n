<?php include 'header.php'; ?>
<?php include 'funciones.php';?>

<div id="main">

	<div id="left">
				<strong>Autoeco</strong>
				<p>Distribuidor exclusivo para España 
			    de las marcas:</p>
	  <div id="centrado">
		  <p><a href="http://www.auxol.com"><img src="img/auxol.jpg" alt="Auxol" name="auxol" width="104" height="58" id="auxol" longdesc="http://www.auto-eco.es/pdf/Catalogo_Auxol_2013_web.pdf"></a></p>
		  <p><a href="http://www.clean-force.es"><img src="img/cleanforce.jpg" alt="Auxol" name="cleanforce" width="69" height="58" id="cleanforce" longdesc="http://www.auto-eco.es/pdf/Catalogo_Auxol_2013_web.pdf"></a></p>
		  <p><a href="pdf/Catalogo_Ducati_Autoeco_2013.pdf"><img src="img/oficial.gif" alt="Auxol" name="ducati" width="111" height="58" id="ducati" longdesc="http://www.auto-eco.es/pdf/Catalogo_Auxol_2013_web.pdf"></a></p>
		  <p><a href="pdf/Catalogo_AutoFreeze_2013.pdf"><img src="img/autofreeze.jpg" alt="Auxol" name="autofreeze" width="146" height="58" id="autofreeze" longdesc="http://www.auto-eco.es/pdf/Catalogo_Auxol_2013_web.pdf"></a></p>
	  </div>
	</div>
            
<form method="post" action="check_pass.php">

	<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">

			<h2>Login</h2>

			<div id="username_input">

				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">
					<input type="text" name="Afiliado" id="url" value="Número de afiliado" onclick="this.value = ''">
					<img id="url_user" src="./img/usericon.png" alt="">
				</div>

				<div id="username_inputright"></div>

			</div>

			<div id="password_input">

				<div id="password_inputleft"></div>

				<div id="password_inputmiddle">
					<input type="password" name="Password" id="url" value="Password" onclick="this.value = ''">
					<img id="url_password" src="./img/passicon.png" alt="">
				</div>

				<div id="password_inputright"></div>

			</div>

			<div id="submit">
				<input type="image" src="./img/submit_hover.png" id="submit1" value="Sign In">
				<input type="image" src="./img/submit.png" id="submit2" value="Sign In">
			</div>



			<div id="links_left">

			<a href="rescatar_password.php">¿Olvidaste tu identificación?</a>

			</div>

			<div id="links_right"><a href="./afiliado/afiliado_nuevo.php">¿Quieres afiliarte?</a></div>

		</div>

		<div id="wrapperbottom"></div>
	</div>
</form>


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