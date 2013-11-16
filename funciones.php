<?php

//funcion para conectar a la base de datos y verificar la existencia del usuario
function conexiones($Afiliado, $Password) {
	//conexion con el servidor de base de datos MySQL
    $db = db_connect();

	//sentencia sql para consultar el nombre del usuario
	$sql = "SELECT * FROM signup WHERE Afiliado='$Afiliado' AND Password='$Password'";
	
	//ejecucion de la sentencia anterior
	$ejecutar_sql=mysql_query($sql,$db);
	//si existe inicia una sesion y guarda el nombre del usuario
	if (mysql_num_rows($ejecutar_sql)==1){
	    // recupera los datos
	    $row = mysql_fetch_array($ejecutar_sql, MYSQL_ASSOC);
	    
		//inicio de sesion
		session_start();
		//configurar un elemento usuario dentro del arreglo global $_SESSION
		$_SESSION['Afiliado']=$row['Afiliado'];
		$_SESSION['Tipo'] = $row['Tipo'];
		$_SESSION['Empresa'] = $row['Empresa'];
		$_SESSION['Contacto'] = $row['Contacto'];
		$_SESSION['Email'] = $row['Email'];
		$_SESSION['Red'] = $row['Red'];
		$_SESSION['Puntos'] = $row['Puntos'];
		$_SESSION['Puntos2'] = $row['Puntos2'];
		mysql_close($db);
		//retornar verdadero
		return true;
	} else {
		//retornar falso
		mysql_close($db);
		return false;
	}
}

//funcion para verificar que dentro del arreglo global $_SESSION existe el nombre del usuario
function verificar_usuario(){
	//continuar una sesion iniciada
	//session_start();
	//comprobar la existencia del usuario
if ($_SESSION['Afiliado']){
	return true;
	}
}


// funcion para conectarse a la bd

function db_connect() {
	
	require("config.php");

	$connexion = mysql_connect($server,$user,$pwd);

    if(!$connexion) die("Error connecting to MySQL database! error #".mysql_errno()." :" . mysql_error());
               
    mysql_select_db($db_name ,$connexion);

    return $connexion;

}



//funcion listar carpetas
function listar_ficheros ($carpeta){
    //Comprobamos que la carpeta existe
    if (is_dir ($carpeta)){
        //Escaneamos la carpeta usando scandir
        $scanarray = scandir ($carpeta);
	echo "<table class='ListadoTabla'>
			<tr>
			<td><strong>Documento</strong></td>
			<td><strong>Tipo</strong></td>
			<td><strong>Tamaño</strong></td>
			</tr>";			
        for ($i = 0; $i < count ($scanarray); $i++){
            //Eliminamos  "." and ".." del listado de ficheros
            if ($scanarray[$i] != "." && $scanarray[$i] != ".."){
		//No mostramos los subdirectorios
		if (is_file ($carpeta . "/" . $scanarray[$i])){
                        //Verificamos que la extension se encuentre en $tipos
				echo "<tr>";
				$thepath = pathinfo ($carpeta . "/" . $scanarray[$i]);
				$urltotal = $carpeta . "/" . $scanarray[$i];
				echo '<td><a href="' . $urltotal . '">'.$scanarray[$i].'</td></a>';				
				echo "<td>".$thepath['extension']."</td>";
				echo "<td>".formato_tam(filesize($carpeta . "/" . $scanarray[$i]));
				echo "</tr>";
                }
            }
        }
	echo "</table>";
    } else {
        echo "La carpeta no existe";
    }
}
function formato_tam($size, $precision = 0) {
    $sizes = array('Tb', 'Gb', 'Mb', 'Kb', 'bytes');
    $total = count($sizes);
    while($total-- && $size > 1024) $size /= 1024;
    return round($size, $precision)." ".$sizes[$total];
}


// $columnas: la primera columna debe ser la clave primaria o unica, un ID...!
function dibuja_tabla( $table, $tipo, $columns, $col_titles, $col_visibility, $cond='') {
	
	$link=db_connect();
	
	//preparamos la consulta
	$sql = "select ". $columns ." from " . $table;
	
	if( strlen($cond) > 0 ) { $sql .= " where " . $cond;}

	$result=mysql_query($sql,$link);	

	if (!$result) {
	    echo 'Imposible ejecutar la consulta a la base de datos: ' . mysql_error();
	    exit;
	}
	
	echo "<table id='t_".$table."' class='ListadoTabla'>";
	
	// cabecera de la tabla
	echo "<tr class='t_head'>";
		
	$fields_info = array();
	$numfields = mysql_num_fields($result);
	// recuperamos los titulos de la colmnas
	$col_title = explode(",", $col_titles);
	$visibility = explode(",", $col_visibility);

	
	for ($i = 0; $i < $numfields; $i++) {
    	$meta = mysql_fetch_field($result, $i);
    	
    	$fields_info[$i] = $meta;
    	
    	if ($meta and $visibility[$i] != 'H') {
    		echo "<td class= 'col_" . $col_title[$i] ."'> " . $col_title[$i] . " </td>";
        }
    }
	echo "</tr>";

	// contenido de la tabla
    for ($i = 0; $i < mysql_num_rows($result); $i++){ 
        $row = mysql_fetch_array($result);
                
        if(!$row) { echo"<p class='nok'>".mysql_error()." <p>"; exit(); }
        if(!mysql_num_rows($result)) {echo "<p class='nodata'> No hay datos.. <p>";}

        $class = (($i % 2) == 0) ? "table_odd_row" : "table_even_row";

        echo "<tr class='t_row'>";
        echo "<form method='post' action=\"../update.php\">\n";
        
		for ($j = 0; $j < $numfields; $j++) {
			//if($tipo=='S' && $is_editable[$j]) {
			switch($visibility[$j]){
				case 'E':
					printf( "<td class='col_%s'><input type='text' name='%s' value='%s' %s %s></td>",
							$fields_info[$j]->name, $fields_info[$j]->name, $row[$j], ($fields_info[$j]->not_null)? "required":"", ($j)?"":"readonly ");
					break;
				case 'V':
					printf("<td class='col_%s %s'>%s</td>",trim($fields_info[$j]->name), $class, $row[$j]);
					break;
				default: null;
			}
	    }

	    // añade acciones al final del registro 
        if($tipo=='S' || $tipo=='D') {
	        	echo "	<td class='col_upd'><input type=\"image\" onclick=\"return confirm('Esta a punto de actualizar los datos de $row[1]')\" src=\"../img/update.png\" alt=\"Actualizar registro\" class=\"update\" title=\"Actualizar registro\"></td>";
	        	if($tipo=='S') {
		        	echo "<td><a href=\"../delete.php?Tabla=" .$table . "&ID=" .$row[0]. "&ID-name=". $fields_info[0]->name 
		        		 . "\" onclick=\"return confirm('Seguro que quieres suprimir $row[1]')\"><img title='Suprimir registro' alt=\"Suprimir\" class='del' src='../img/delete.png'/></a></td>\n";
	        	}
	        	echo "<input type=\"hidden\" value=\"$table\" name='Tabla'><input type=\"hidden\" name = 'ID-name' value=\"".$fields_info[0]->name."\">\n";
        }
        echo "</form>";
        echo "</tr>";

    }
    
    echo '</table>'; ?>
    
<!--    
    <b>Leyenda:</b>
	<br />
	<img alt="Actualizar" src="img/update.png"> Actualizar registro.<br />
	<img alt "Suprimir" src="img/delete.png"> Suprimir registro.<br />
	</div>
    
-->    
    

   
    
    
    
    

	<?php
    mysql_close($link);
}

?>