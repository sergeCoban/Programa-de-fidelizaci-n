<?php include '../header.php'; ?>

		<div id="main">

			<div id="signupform">
				<strong>Taller. Bienvenido al Programa de Fidelidad de AUTOECO</strong>
				<p>
					Si quieres beneficiarte de las ventajas del programa, registrate y recibirás tu código de afiliado.
				</p>
			</div>

			<form class="cmxform clearfix" id="signupForm" method="post" action="thanks_taller.php">
				<h1>Únete al Programa de Fidelidad:</h1>
				<fieldset>
					<p>
						<label for="ccompany">Empresa: </label>
						<input id="ccompany" name="company" type="text" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="2" data-msg-minlength="Muy corto" />
					</p>
					<p>
						<label for="cname">Contacto: </label>
						<input id="cname" name="name" type="text" data-rule-required="true" data-msg-required="!!" data-rule-minlength="2" data-msg-minlength="Muy corto" />
					</p>
    				<p>
						<label for="cemail">Correo electrónico: </label>
						<input id="cemail" type="email" name="email" data-rule-required="true" data-msg-required="!!" data-rule-email="true" data-msg-email="email no válido" />
					</p>
					<p>
						<label for="caddress">Dirección: </label>
                        <input id="caddress" name="address"  type="text" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="2" data-msg-minlength="Muy corto" />
					</p>
					<p>
						<label for="czip">Código postal: </label>
						<input id="czip" name="zip" type="text"  data-rule-required="true" data-msg-required="!!" data-rule-maxlength="5" data-msg-maxlength="5 cifras" data-rule-number="true" data-msg-number="solo números" />
					</p>
					<p>
						<label for="ccity">Población: </label>
						<input id="ccity" name="city"  type="text" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="3" data-msg-minlength="Muy corto" />
					</p>
					<p>
						<label for="cphone">Teléfono: </label>
						<input id="cphone" name="phone" type="text" data-rule-required="true"  data-msg-required="!!" data-rule-minlength="9" data-msg-minlength="Muy corto" data-rule-number="true" data-msg-number="solo números" />
					</p>
					<p>
						<label for="cemployees">Nº de empleados: </label>
						<input id="cemployees" name="employees" type="text" data-rule-required="true" data-msg-required="!!" data-rule-number="true" data-msg-number="solo números" />
					</p>
					<p>
						<label for="cpassword">Intruzca su palabra clave:</label>
						<input id="cpassword" name="password" type="password"  data-rule-required="true" data-msg-required="!!" data-rule-minlength="8" data-msg-minlength="mínimo 8 letras" data-rule-maxlength="8" data-msg-maxlength="máximo 8 letras" />
					</p>
					<p>
					<label for="confirm_password">Confirme su palabra clave:</label>
					<input id="confirm_password" name="confirm_password" type="password" data-rule-required="true" data-msg-required="!!" data-rule-equalTo="#cpassword" data-msg-equalTo="¡no coincide!" data-rule-minlength="8" data-msg-minlength="mínimo 8 letras" data-rule-maxlength="8" data-msg-maxlength="máximo 8 letras" />
					</p>
                 	<p>
                    	<label>He leido y acepto las <a href="../condiciones-legales.php" target="_blank">condiciones legales</a></label>
						<input type="checkbox" id="legal" name="legal" data-rule-required="true" data-msg-required="acepte las conficiones legales" /> 
					</p>
					<p>
						<input class="submit" type="submit" value="Unirte"/>
					</p>
					<input type='hidden' id="cnetwork" name="network" value="Por asignar" type="text" readonly />
				</fieldset>
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