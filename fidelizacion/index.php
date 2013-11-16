
<?php include 'header.php'; ?>

		<div id="main">

			<div id="signupform">
				<strong>Bienvenido al Programa de Fidelidad de AUTOECO</strong>
				<p>
					Si quieres beneficiarte de las ventajas del programa, registrate y recibirás tu código de afiliado.
				</p>
			</div>

			<form class="cmxform clearfix" id="signupForm" method="post" action="thanks.php">
				<h1>Únete al Programa de Fidelidad:</h1>
				<fieldset>
					
					<p>
						<label for="ccompany">Empresa: </label>
						<input id="ccompany" name="company" minlength="2" type="text" required />
					<p>
					<p>
						<label for="cname">Contacto: </label>
						<input id="cname" name="name" minlength="2" type="text" required />
					<p>
						<label for="cemail">Correo electrónico: </label>
						<input id="cemail" type="email" name="email" required />
					</p>
					<p>
						<label for="caddress">Dirección: </label>
						<input id="caddress" name="address" minlength="10" type="text" required />
					</p>
					<p>
						<label for="czip">Código postal: </label>
						<input id="czip" name="zip" minlength="5" type="text" required />
					</p>
					<p>
						<label for="ccity">Población: </label>
						<input id="ccity" name="city" minlength="3" type="text" required />
					</p>
					<p>
						<label for="cphone">Teléfono: </label>
						<input id="cphone" name="phone" minlength="9" type="text" required />
					</p>
					<p>
						<label for="cemployees">Nº de empleados: </label>
						<input id="cemployees" name="employees" type="text" required />
					</p>
					<p>
						<label for="cnetwork">Pertenece a una red de talleres, cual:</label>
						<input id="cnetwork" name="network" minlength="2" type="text" required />
					</p>
					<p>
						<input type="checkbox" required> 
						<label>He leido y acepto las <a href="condiciones-legales.php" target="_blank">condiciones legales</a></label>
					</p>
					<p>
						<input class="submit" type="submit" value="Unirte"/>
					</p>
				</fieldset>
			</form>

		</div>
	</div><!--container-->		


</body>
</html>
