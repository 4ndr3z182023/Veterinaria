<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Registro | PetCol</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="icon" type="image/png" sizes="96x96" href="/veterinaria/assets/imagenes/icono.png">
	<link rel="stylesheet" href="/veterinaria/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/veterinaria/assets/css/style.css">

</head>

<body>


	<?php 
		include "../modelo/conexiondb.php";
    	include "cabecera.php";
	?>

	<div class="seccion-general">
		<div class="container pt-3 pb-5">
			<div class="row pl-5 pr-5">
				<div class="col-12 text-center">
					<h3>Regístrate</h3>
				</div>
				<div class="col-12 text-center">
					<p>Te invitamos a ser parte de nuestra comunidad en la cual te podrás enterar de lo último en las mejores marcas, novedades y promociones diseñadas para ti.</p>
				</div>
				<div class="col-12">
					<div class="p-3">
						<form action="/veterinaria/controlador/autenticacionControlador.php">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Nombre</label>
									<input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Apellido</label>
									<input type="text" class="form-control" placeholder="Apellido" name="apellido" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputGenero">Tipo Documento</label>
									<select id="inputGenero" class="form-control" name="tipoDocumento" required>
										<option selected>[Seleccionar]</option>
										<?php
											$query = $conexion -> query ("SELECT * FROM tipoDocumento");
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores[IdTipoDocumento].'">'.$valores[Descripcion].'</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label for="inputEmail4">Número Documento</label>
									<input type="number" class="form-control" placeholder="Número Documento" name="identificacion" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputCity">Correo electrónico</label>
									<input type="email" class="form-control" placeholder="Correo electrónico" name="email" required>
								</div>
								<div class="form-group col-md-6">
									<label for="inputGenero">Genero</label>
									<select id="inputGenero" class="form-control" name="genero" required>
										<option selected>[Seleccionar]</option>
										<?php
											$query = $conexion -> query ("SELECT * FROM genero");
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores[IdGenero].'">'.$valores[Descripcion].'</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
								<label for="inputCity">Dirección</label>
								<input type="text" class="form-control" placeholder="Dirección" name="direccion" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputEmail4">Contraseña</label>
									<input type="password" class="form-control" placeholder="Contraseña" name="contrasena" required>
								</div>
								<div class="form-group col-md-6">
									<label for="inputPassword4">Repetir Contraseña</label>
									<input type="password" class="form-control" placeholder="Repetir Contraseña" required>
								</div>
							</div>
							<div class="form-group">
								<div class="form-check">
								<input class="form-check-input" type="checkbox" id="gridCheck">
								<label class="form-check-label" for="gridCheck">
									Autorizo el uso de mis datos personales, según condiciones disponibles aquí
								</label>
								</div>
							</div>
							<button type="submit" class="btn btn-primary" name="registro">Registrarme</button>
						</form>
						<div>
							<?php 
								if(isset($_REQUEST['resul'])) 
								{
									if($_REQUEST['resul']=="si")
									{
										echo "<div class='alert alert-success'><strong>Bien!</strong> Registro Exitoso!!!.
										</div>";
									}
									if($_REQUEST['resul']=="no")
									{
										echo "<div class='alert alert-danger'><strong>No!</strong> Registro No Exitoso!!!.
										</div>";
									}
									if($_REQUEST['resul']=="existe")
									{
										echo "<div class='alert alert-warning'><strong>No!</strong> Usuario ya Existe!!!.
										</div>";
									}
									if($_REQUEST['resul']=="reg")
									{
										echo "<div class='alert alert-warning'><strong>No!</strong> Por Favor debe Registrarse!!!.
										</div>";
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php 
    	include "footer.php";
	?>
	
	<script src="/veterinaria/assets/vendor/jquery/jquery.min.js"></script>
	<script src="/veterinaria/assets/vendor/jquery/jquery-slim.min.js"></script>
    <script src="/veterinaria/assets/vendor/popper/popper.min.js"></script>
    <script src="/veterinaria/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
