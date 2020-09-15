<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>ADAMSpay</title>

	<meta name="description" content="Ejemplo de venta de adhesiones usando servicios en la nube">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
		integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assests/adams.css" crossorigin="anonymous">

</head>

<body>

	<div id="container">
		<h1>Bienvenido</h41>
			<div class="float-right m-2"><img style="height:90px" src="assests/fruta.jpg"></div>
			<h3>FRUTERIA <b style="font-weight:900;color:#cc0000">Adams</b><span style="color:#000">Pay</span></h3>
			<small id="precioHelp" class="form-text text-muted">Bienvenido a la carga de billetera para su tarjeta de
				compras </small>
			<div class="card bg-light shadow mt-5">
				<div class="card-body">
					<div class="container">
						<div class="row">
							<div class="form-group col-lg-6">
								<p> <strong> SELECCIONE SU TIPO DE TARJETA: </strong></p>
								<select class="form-control" required id="select">
									<option></option>
									<option value="VISA Adams">VISA Adams</option>
									<option value="MASTERCAD Adams">MASTERCAD Adams</option>
									<option value="INFONET Adams">INFONET Adams</option>
								</select>

							</div>
							<div class="form-group col-lg-4">
								<p for="exampleInputEmail1"> PRECIO</p>
								<input type="number" class="form-control" min="4" required id="precio" placeholder="INGRESE">
								<small id="precioHelp" class="form-text text-muted">Cargue el monto a abonar</small>
							</div>

						</div>
					</div>
					<a href="?" id="cancelar" class="btn btn-secondary mr-2">Cerrar</a>
					<button class="btn btn-primary" name="" id="submit">Realizar Pago</button>
				</div>
				<div id="succes" class="container">
					<div>
						<p>Para poder continuar con la carga de su tarjeta favor ingresar al siguiente link : <h3 id="alerta"></h3> </p>
					</div>
					<p>Muchas gracias por siempre elegirnos</p>
				</div>
				<div id="notificacion"></div>
			</div>
	</div>
	<script type="text/javascript" src="assests/adams.js"></script>

</body>

</html>