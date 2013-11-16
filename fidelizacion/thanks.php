<?php include 'header.php'; ?>

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


/*CODIGO DE AFILIADO*/
$codigoafiliado = date('yzHis').rand(10,99);

/*access to database*/

          /*  $username="autoecoauto";
            $password="4PeXZsQc";
            $database="autoecoauto";

            $enlace = mysql_connect('mysql51-88.perso',$username,$password);
            if (!$enlace) {
                die('No se pudo conectar: ' . mysql_error());
            }
            echo 'Conectado con éxito';
             mysql_select_db($database ,$enlace);*/

          
               $db = mysql_connect("mysql51-88.perso","autoecoauto","4PeXZsQc");
               if(!$db) die("Error connecting to MySQL database.");
               mysql_select_db("autoecoauto" ,$db);
           

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

    echo '<li>'.$company.'</li>';
    echo '<li>'.$name.'</li>';
    echo '<li>'.$email.'</li>';
    echo '<li>'.$address.'</li>';
    echo '<li>'.$zip.'</li>';
    echo '<li>'.$city.'</li>';
    echo '<li>'.$phone.'</li>';
    echo '<li>'.$employees.'</li>';
    echo '<li>'.$network .'</li></ul></div>';

mysql_query("Insert Into signup (Empresa, Contacto, Email, Address, Codigopostal, Poblacion, Telefono, Empleados, Red, Afiliado, IP) values ('"
    . mysql_real_escape_string($company) . "', '"
    . mysql_real_escape_string($name) . "', '"
    . mysql_real_escape_string($email) . "', '"
    . mysql_real_escape_string($address) . "', '"
    . mysql_real_escape_string($zip) . "', '"
    . mysql_real_escape_string($city) . "', '"
    . mysql_real_escape_string($phone) . "', '"
    . mysql_real_escape_string($employees) . "', '"
    . mysql_real_escape_string($network) . "', '"
    . $codigoafiliado . "', '"
    . $ip . "')");
    mysql_close($db);


 
    /*EMAIL TO CLIENT*/

    $to = $email;

    $subject = 'Código de afiliado AUTO ECO';

    $headers = "From: info@auto-eco.es\r\n";
    $headers .= "Reply-To: info@auto-eco.es\r\n";
    //$headers .= "CC: lucas@beoninternet.net\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message = '<html><body>';
    $message .= '<h1>Hola '.$name.'</h1>';
    $message .= '<p>Gracias por haberte unido al Programa de Fidelidad de Autoeco. </p>';
    $message .= '<p>Tu c&oacute;digo de afiliado es: ';
    $message .= $codigoafiliado;
    $message .= '</p>';
    $message .= '';
    $message .= '<p>AUTOECO</p>';
    $message .= '</body></html>';

    mail($to, $subject, $message, $headers);


    /*EMAIL TO AUTO ECO*/

    $toauto = 'pgoyard@clean-force.es';
    //$toauto = 'luc@plaisantin.com';

    $subject2 = 'Código de afiliado AUTO ECO';

    $headers2 = "From: info@auto-eco.es\r\n";
    $headers2 .= "Reply-To: info@auto-eco.es\r\n";
    //$headers2 .= "CC: lucas@beoninternet.net\r\n";
    $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $message2 = '<html><body>';
    $message2 .= '<p>Hola,</p>';
    $message2 .= '<p>Se ha dado de alta '.$name.' de la empresa '.$company.'</p>';
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
