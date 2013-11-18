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
        
        <?php /*dibuja_tabla('signup', 'S', 'Afiliado, Empresa, Contacto, Poblacion, Tipo, Red, Puntos, Puntos2, Fechaalta, Modificado', 
        								  'Afiliado, Empresa, Contacto, Población, Tipo, Red, Puntos Acumulados, Canjeados, Alta, Modificado',
        								  'H,V,V,V,V,V,E,E,V,V'); */?>
        
        <div class="demo-info" style="margin-bottom:10px">
			<div class="demo-tip icon-tip">&nbsp;</div>
			<div>Haz Doble click en un registro para editar.</div>
			</div>
			
			<table id="dg" title="Lista de talleres de tu zona" style="width:620px;height:350px"
			toolbar="#toolbar" pagination="true" idField="Afiliado"
			rownumbers="false" fitColumns="true" singleSelect="true">
			<thead>
			<tr>
				<th field="Afiliado" width="30" sortable="true">Afiliado</th>
				<th field="Empresa" width="30" sortable="true">Empresa</th>
				<th field="Contacto" width="20">Contacto</th>
				<th field="Puntos" width="15" editor="{type:'validatebox',options:{required:true}}">Puntos Canjeados</th>
				<th field="Modificado" width="20">Última Actualización</th>
			</tr>
			</thead>
			</table>
			<div id="toolbar">
			<a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Crear</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Suprimir</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Guardar</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancelar</a>
		</div>

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
