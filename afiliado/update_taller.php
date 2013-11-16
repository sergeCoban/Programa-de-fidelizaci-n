<?php 	session_start();  	?>
<?php include '../funciones.php'; ?>
<?php 
	session_start();  					// siempre iniciar la sesión antes de generar nada en la pagina !
	$Afiliado = $_SESSION['Afiliado'];	// se recupera el nº de afiliado
	
	include '../header.php'; // ahora ya se puede incluir el header, así que los errores salgan con el header...
	
	if( !$Afiliado || strlen($Afiliado) == 0 ) die("<br /><h1> Debes estar conectado para ver esta pagina Pillín!!</h1><br /></div></body></html>");
?>
        <div id="main">
            <nav class="pages"><a href="../ingreso.php">&larr; Programa de Fidelidad</a></nav>

<?php

/*FECHA MODIFICADO
$modificado = strftime("%A, %d de %B de %Y");*/
date_default_timezone_set('Europe/Madrid');
setlocale(LC_TIME, 'spanish');
$modificado = date("d/m/y H:i:s");


/*get variables from the form*/

    $company =$_POST['company'];
    $name =$_POST['name'];
    $email =$_POST['email'];
    $address =$_POST['address'];
    $zip =$_POST['zip'];
    $city =$_POST['city'];
    $phone =$_POST['phone'];
    $employees =$_POST['employees'];
    $network =$_POST['network'];
    $password =$_POST['password'];
	$Tipoafiliado ='T';
	
	$db = db_connect();

	$sql =    "Update signup set "
				. "Empresa ='" . mysql_real_escape_string($company) . "',"
			    . "Contacto ='" . mysql_real_escape_string($name) . "', "
			    . "Email ='" . mysql_real_escape_string($email) . "', "
			    . "Address ='" . mysql_real_escape_string($address) . "', "
			    . "Codigopostal ='" . mysql_real_escape_string($zip) . "', "
			    . "Poblacion ='" . mysql_real_escape_string($city) . "', "
			    . "Telefono ='" . mysql_real_escape_string($phone) . "', "
			    . "Empleados ='" . mysql_real_escape_string($employees) . "', "
				. "Modificado ='" . mysql_real_escape_string($modificado) . "', "
			    . "Red ='" . mysql_real_escape_string($network) . "' ";
			    
	if( $password && strlen($password) > 0 ) {
			  $sql .= ", Password ='" . mysql_real_escape_string($password) . "' ";
			  }
	$sql .= "Where Afiliado = '" . $Afiliado . "'"; 
			    
	// preparamos el sql
	
	
	
	//
	if( mysql_query($sql, $db) )
	{
	
	  	//actualiza los datos de la sesión 
		$_SESSION['Empresa'] = $company;
		$_SESSION['Contacto'] = $name;
		$_SESSION['Email'] = $email;	
		
		
	    echo '<p><strong>Tus datos han sido actualizados con exito!</strong></p>';
	    echo '<div class="ok">En breve recibirás un email de confirmación.</div>';
	    echo '<div class="datasent"><h1>Datos enviados:</h1><ul>';
	
	    echo '<li><b>Empresa: </b>'.$company.'</li>';
	    echo '<li><b>Persona de contacto: </b>'.$name.'</li>';
		echo '<li></li>';
	
	    echo '<li><b>Email: </b>'.$email.'</li>';
	    echo '<b>Direcci&oacute;n: </b><li>'.$address.'</li>';
	    echo '<li>'.$zip.'</li>';
	    echo '<li>'.$city.'</li>';
	    echo '<li>'.$phone.'</li>';
	    echo '<li><b>N&uacute;mero de empleados: </b>'.$employees.'</li>';
	    /*    echo '<li>'.$network .'</li>';*/
	    echo '<li><b>Contraseña: </b>'.$password .'</li></ul></div>';
	    
	    /*EMAIL TO CLIENT*/
	
	    $to = $email;
	
	    $subject = 'Código de afiliado AUTO ECO';
	
	    $headers = "From: info@auto-eco.es\r\n";
	    $headers .= "Reply-To: info@auto-eco.es\r\n";
	    $headers .= "MIME-Version: 1.0\r\n";
	    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	    $message = '<html><body>';
	    $message .= '<h1>Hola '.$name.'</h1>';
	    $message .= '<p>Tus datos del Programa de Fidelidad de Autoeco han sido actualizados: </p>';
	    $message .= '<li><b>Empresa: </b>'.$company.'</li>';
	    $message .= '<li><b>Persona de contacto: </b>'.$name.'</li>';
	    $message .= '<li><b>Email: </b>'.$email.'</li>';
	    $message .= '<li></li>';
	    $message .= '<b>Direcci&oacute;n: </b><li>'.$address.'</li>';
	    $message .= '<p>Codigo postal: '.$zip.'</p>';
	    $message .= '<p>Poblacion: '.$city.'</p>';
	    $message .= '<p>Telefono: '.$phone.'</p>';
	    $message .= '<p>Empleados: '.$employees.'</p>';
	    $message .= '<p>Red: '.$network.'</p>';
	    $message .= '</p>';
	    $message .= '';
	    $message .= '<p>AUTOECO</p>';
	    $message .= '</body></html>';
	
	    mail($to, $subject, $message, $headers);
    }
    else {
	    echo "Error al actualizar los datos: " . mysql_error();
    }
    
    mysql_close($db);



?>
        </div>
    </div><!--container-->      


</body>
</html>
