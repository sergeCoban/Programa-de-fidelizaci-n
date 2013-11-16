<?php 
		include '../header.php'; 
		include '../funciones.php';
?> 

        <div id="main">
            <nav class="pages"><a href="/">&larr; Programa de Fidelidad</a></nav>

<?php


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
	

/*CODIGO DE AFILIADO*/
$codigoafiliado = date('yzHis').rand(10,99);

/*FECHA MODIFICADO
$modificado = strftime("%A, %d de %B de %Y");*/
date_default_timezone_set('Europe/Madrid');
setlocale(LC_TIME, 'spanish');
$modificado = date("d/m/y H:i:s");

$db = db_connect();
           

/*IP*/

    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    //return $ip;


/*CHECK IF IP is already in DB*/
$queryip = mysql_query("SELECT * FROM signup WHERE IP = '". $ip."'"); 
if (mysql_num_rows($queryip) > 0) 
{ 
     echo '<div class="warning">Existe un afiliado registrado desde la misma fuente. Solo se puede otorgar 1 código por taller.</div>'; 
}

else {

    echo '<p><strong>Gracias por haberte unido al Programa de Fidelidad de Autoeco. </strong></p>';
    echo '<div class="ok">En breve recibirás un email con tu código de afiliado.</div>';
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

mysql_query("Insert Into signup (Empresa, Contacto, Email, Address, Codigopostal, Poblacion, Telefono, Empleados, Red, Password, Afiliado, Tipo, Modificado, IP, Puntos, Puntos2) values ('"
    . mysql_real_escape_string($company) . "', '"
    . mysql_real_escape_string($name) . "', '"
    . mysql_real_escape_string($email) . "', '"
    . mysql_real_escape_string($address) . "', '"
    . mysql_real_escape_string($zip) . "', '"
    . mysql_real_escape_string($city) . "', '"
    . mysql_real_escape_string($phone) . "', '"
    . mysql_real_escape_string($employees) . "', '"
    . mysql_real_escape_string($network) . "', '"
    . mysql_real_escape_string($password) . "', '"
    . $codigoafiliado . "', '"
	. $Tipoafiliado . "', '"
    . $modificado . "', '"
    . $ip . "', 0, 0)");
    mysql_close($db);


 
    /*EMAIL TO CLIENT*/

    $to = $email;

    $subject = 'Código de afiliado AUTO ECO';

    $headers = "From: info@auto-eco.es\r\n";
    $headers .= "Reply-To: info@auto-eco.es\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<html><body>';
    $message .= '<h1>Hola '.$name.'</h1>';
    $message .= '<p>Gracias por haberte unido al Programa de Fidelidad de Autoeco. </p>';
    $message .= '<p>Tu c&oacute;digo de afiliado es: ';
    $message .= $codigoafiliado;
    $message .= '</p>';
    $message .= '<p>Y su password es: ';
    $message .= $password;
    $message .= '</p>';
    $message .= '';
    $message .= '<p>AUTOECO</p>';
    $message .= '</body></html>';

    mail($to, $subject, $message, $headers);


    /*EMAIL TO AUTO ECO*/

    $toauto = 'bernat.peso@gmail.com';
    //$toauto = 'pgoyard@clean-force.es';

    $subject2 = 'Código de afiliado AUTO ECO';

    $headers2 = "From: info@auto-eco.es\r\n";
    $headers2 .= "Reply-To: info@auto-eco.es\r\n";
    $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message2 = '<html><body>';
    $message2 .= '<p>Hola, </p>';
    $message2 .= '<p>se ha dado de alta '.$name.' de la empresa '.$company.'</p>';
    $message2 .= '<p>Codigo postal: '.$zip.'</p>';
    $message2 .= '<p>Poblacion: '.$city.'</p>';
    $message2 .= '<p>Telefono: '.$phone.'</p>';
    $message2 .= '<p>Empleados: '.$employees.'</p>';
    $message2 .= '<p>Red: '.$network.'</p>';
    $message2 .= '<p>IP: '.$ip.'</p>';
    $message2 .= '<p>Codigo de afiliado: '.$codigoafiliado.'</p>';
	
    $message2 .= '</body></html>';

    mail($toauto, $subject2, $message2, $headers2); 

}

?>
        </div>
    </div><!--container-->      


</body>
</html>
