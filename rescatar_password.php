<?php include 'funciones.php'; ?>
<?php include 'header.php'; ?>

    <div id="main">
	<nav class="pages"><a href="ingreso.php">&larr; Programa de Fidelidad</a></nav>
	
	<?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { // si es la primerta llamada se muestra el formulario ?> 
	<div id="signupform">
		<strong>¿Has olvidado tu contraseña?</strong>
		<p>
		Introduce tu email para recibir la contraseña.
		</p>
	</div>
	
	<form class="cmxform clearfix" id="signupForm" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		<h1>Recuperar datos de Afiliado</h1>
		<fieldset>
			<p>
				<label for="cemail">Correo electrónico: </label>
				<input id="cemail" type="email" name="email" data-rule-required="true" data-msg-required="!!" data-rule-email="true" data-msg-email="email no válido" />
			</p>
			<p>
				<input class="submit" type="submit" value="Enviar"/>
			</p>
		</fieldset>
	</form> 
	<?php 
		
	} else { // la llamada es de tipo POST: nos llega la infomación del formulario con el email 

	$emilio=$_POST['email'];
	
	$db = db_connect();
	$sql = "select * from signup where Email = '" . $emilio . "'";  // buscamos registros con ese mail
	
	$result =  mysql_query($sql, $db);
	
	$nbrows=mysql_num_rows($result);

	// si encontramos un y solo un registro con este email => seguimos; en cualquier otro caso : error
	if( $nbrows == 1 )
	{
	    $row = mysql_fetch_array($result, MYSQL_ASSOC);
	    /*EMAIL TO CLIENT*/
	
	    $to = $email;
	
	    $subject = 'Código de afiliado AUTO ECO';
	
	    $headers = "From: info@auto-eco.es\r\n";
	    $headers .= "Reply-To: info@auto-eco.es\r\n";
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	    $message = '<html><body>';
	    $message .= '<h1>Hola '.$row['Contacto'].'</h1>';
	    $message .= '<p><br>Has solicitado la información de acceso al programa de Afiliado de AutoEco:</p>';
	    $message .= '<p>Nº de Afiliado es: '. $row['Afiliado'] .'</p>';
	    $message .= '<p>Tu contraseña es : '. $row['Password'] .'</p>';
	    $message .= '<p><br><br>Tus datos : </p>';
	    $message .= '<p><b>Empresa: </b>'.$row['Empresa'].'</p>';
	    $message .= '<p><b>Persona de contacto: </b>'.$row['Contacto'].'</p>';
	    $message .= '<p><b>Email: </b>'.$row['Email'].'</p>';
	    $message .= '<br>';
	    $message .= '<p><b>Direcci&oacute;n: </b><p>'.$row['Address'].'</p>';
	    $message .= '<p>Código postal: '.$row['Codigopostal'].'</p>';
	    $message .= '<p>Población: '.$row['Poblacion'].'</p>';
	    $message .= '<p>Telefono: '.$row['Telefono'].'</p>';
	    $message .= '<p>Empleados: '.$row['Empleados'].'</p>';
	    $message .= '<p>Red: '.$row['Red'].'</p>';
	    $message .= '<br>';
	    $message .= '';
	    $message .= '<p>AUTOECO</p>';
	    $message .= '</body></html>';
	    
	    //print $message; // debug
	
	    if( mail($emilio, $subject, $message, $headers) ){
	    
		    echo '<p class="ok"><strong>Tus datos han sido enviados con éxito a la dirección: '.$emilio.'</strong></p>';
	    }
	    else // si hay un error de envío
	    {
		    echo '<p class="nok"><strong>Error! No se ha podido enviar la información a la dirección: '.$emilio.'</strong></p>';
	    }
    }  // si no se a encontrado el email o existen más de 1 (como ves es el mismo mensaje que si hay un error de envío: intended funcionality ;)
    else {
		    echo '<p class="nok"><strong>Error! No se ha podido enviar la información a la dirección: '.$emilio.'</strong></p>';
    }
    
    mysql_close($db);
}

?>
   </div><!--container-->      


</body>
</html>
