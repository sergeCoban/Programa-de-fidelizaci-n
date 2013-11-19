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
			
			<table id="dg" title="Lista de talleres de tu zona" style="width:820px;height:350px"
			toolbar="#toolbar" pagination="false" idField="Afiliado"
			rownumbers="false" fitColumns="true" singleSelect="true" striped=true>
			<thead>
			<tr>
				<th field="Afiliado" hidden="true" width="30" sortable="true">Afiliado</th>
				<th field="Empresa" width="30" sortable="true">Empresa</th>
				<th field="Contacto" width="20" sortable="true">Contacto</th>
				<th field="Tipo" width="15" align="right" formatter="formatTipo"
											editor="{type:'combobox',
													 options:{
														valueField:'Tipo', 
														textField:'nombre', 
														data:[{Tipo: 'T', nombre: 'Taller'},{Tipo: 'D', nombre:'Distribuidor'},{Tipo: 'S', nombre: 'Super Usuario'}], 
														panelHeight:68, 
														editable:false, 
														selectOnNavigation:true, 
														required:true}}">Tipo</th>
														
				<th field="Red" width="30" align="right" formatter="formatRed"
										   editor="{type:'combobox',options:{
																	valueField:'id', 
																	textField:'name', 
																	url:'get_distribuidor.php', 
																	panelWidth:200, 
																	editable:false, 
																	selectOnNavigation:true}}">Red</th>
				<th field="Puntos" width="15" align="right" editor="{type:'numberbox',options:{required:true}}">Puntos</th>
				<th field="Puntos2" width="15" align="right" editor="{type:'numberbox',options:{required:true}}">Puntos Canjeados</th>
				<th field="Modificado" width="20" sortable="true" formatter="formatDate">Última Actualización</th>
			</tr>
			</thead>
			</table>
			<div id="toolbar">
			<a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Suprimir</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Guardar</a>
			<a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancelar</a>
		</div>

       <br />
       <div id="inferior">
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Descargar cátalogo<br>
		    de regalos: </a></div>
			<div id=centrado_azul><a href='afiliado_actualizar.php'>Actualice sus datos</a></div>
			<div id=centrado_azul><a href='../salir.php'>Desconectarse </a><br/></div>
      </div>
    </div>

<script type="text/javascript">



function formatTipo(value,row,index) {
		 switch(value) {
			 case 'T': return "Taller";
			 case 'D': return "Distribuidor";
			 case 'S': return "Super Usuario";
			 default: return value;
		 }
}

function formatRed(value,row,index) {
	return row.Red_empresa;
}

function formatDate(value,row,index) {
	var mydate = new Date(value);
	return mydate.toLocaleDateString("es-ES")
}

$(function(){

	$('#dg').edatagrid({
				url: 'get_users.php',
				saveUrl: 'save_user.php',
				updateUrl: 'update_user.php',
				destroyUrl: 'destroy_user.php'
			});

	$('#dg').edatagrid({
		onBeforeSave: function(index){
			var ed = $('#dg').edatagrid('getEditor', {
				index: index,
				field: 'Red'
			});
			//console.log(index + ',' + $(ed.target).combobox('getText'))
			var row = $(this).edatagrid('getRows')[index];
			row.Red_empresa = $(ed.target).combobox('getText');
		}
	});
});


</script>
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
