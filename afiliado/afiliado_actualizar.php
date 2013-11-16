<?php 
	include "../funciones.php";  

	session_start();  					// siempre iniciar la sesión antes de generar nada en la pagina !
	$Afiliado = $_SESSION['Afiliado'];	// se recupera el nº de afiliado
	
	include '../header.php'; // ahora ya se puede incluir el header, así que los errores salgan con el header...
	
	if( !$Afiliado || strlen($Afiliado) == 0 ) die("<br /><h1>El sistema no lo ha identificado, solo los usuarios registrados tienen acceso a esta area</h1><br /></div></body></html>");
	
	$db = db_connect();
	
	$sql = "SELECT * FROM signup WHERE Afiliado='$Afiliado'";
	
	//ejecucion de la sentencia anterior
	$resultado_sql=mysql_query($sql,$db);
	
	$nbrows=mysql_num_rows($resultado_sql);

	if ($nbrows!=1){ // por si acaso... 
		//Error
		echo "<br /><h1> Error! numero de filas encontrado : $nbrows</h1><br />";

	} else {
		//retornar falso
		$row = mysql_fetch_array($resultado_sql, MYSQL_ASSOC);  // el resultado lo carga en un array associativo
	}
	mysql_close($db);

?>

		<div id="main">

			<div id="signupform">
				<strong>Tu cuenta....</strong>
				<p>
					Mantén tu datos actualizados bla bla...
				</p>
			</div>

			<form class="cmxform clearfix" id="signupForm" method="post" action="update_taller.php">
				<h1>Únete al Programa de Fidelidad:</h1>
				<fieldset>
					<p>
						<label for="ccompany">Empresa: </label>
						<input id="ccompany" name="company" type="text" value="<?php echo $row['Empresa']?>" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="2" data-msg-minlength="Muy corto" />
					</p>
					<p>
						<label for="cname">Contacto: </label>
						<input id="cname" name="name" type="text" value="<?php echo $row['Contacto']?>" data-rule-required="true" data-msg-required="!!" data-rule-minlength="2" data-msg-minlength="Muy corto" />
					</p>
    				<p>
						<label for="cemail">Correo electrónico: </label>
						<input id="cemail" type="email" name="email" value="<?php echo $row['Email']?>" data-rule-required="true" data-msg-required="!!" data-rule-email="true" data-msg-email="email no válido" />
					</p>
					<p>
						<label for="caddress">Dirección: </label>
                        <input id="caddress" name="address"  type="text" value="<?php echo $row['Address']?>" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="2" data-msg-minlength="Muy corto" />
					</p>
					<p>
						<label for="czip">Código postal: </label>
						<input id="czip" name="zip" type="text"  value="<?php echo $row['Codigopostal']?>" data-rule-required="true" data-msg-required="!!" data-rule-maxlength="5" data-msg-maxlength="5 cifras" data-rule-number="true" data-msg-number="solo números" />
					</p>
					<p>
						<label for="ccity">Población: </label>
						<input id="ccity" name="city"  type="text" value="<?php echo $row['Poblacion']?>" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="3" data-msg-minlength="Muy corto" />
					</p>
					<p>
						<label for="cphone">Teléfono: </label>
						<input id="cphone" name="phone" type="text" value="<?php echo $row['Telefono']?>" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="9" data-msg-minlength="Muy corto" data-rule-number="true" data-msg-number="solo números" />
					</p>
					<p>
						<label for="cemployees">Nº de empleados: </label>
						<input id="cemployees" name="employees" type="text" value="<?php echo $row['Empleados']?>" data-rule-required="true" data-msg-required="!!" data-rule-number="true" data-msg-number="solo números" />
					</p>
					<p>
						<label for="cnetwork">Pertenece a una red de talleres, cual:</label>
						<input id="cnetwork" name="network" value="Por asignar" type="text" readonly />
					</p>
					<p>
						<label for="cpassword">Introduzca una nueva palabra clave:</label>
						<input id="cpassword" name="password" type="password"  data-rule-required="true" data-msg-required="!!" data-rule-minlength="8" data-msg-minlength="mínimo 8 letras" data-rule-maxlength="8" data-msg-maxlength="máximo 8 letras" />
					</p>
					<p>
					<label for="confirm_password">Confirme nueva palabra clave:</label>
					<input id="confirm_password" name="confirm_password" type="password" data-rule-required="true" data-msg-required="!!" data-rule-equalTo="#cpassword" data-msg-equalTo="¡no coincide!" data-rule-minlength="8" data-msg-minlength="mínimo 8 letras" data-rule-maxlength="8" data-msg-maxlength="máximo 8 letras" />
					</p>
					<p>
						<input class="submit" type="submit" value="Guardar"/>
						<input class="submit" type="reset" value="Restaurar"/>
					</p>
				</fieldset>
			</form>

		</div>
	</div><!--container-->	

</body>
</html>
