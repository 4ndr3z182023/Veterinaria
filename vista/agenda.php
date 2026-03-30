<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Agendamiento de cita | PetCol</title>
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
			<div class="row">
				<div class="col-12 text-center">
					<h3>Agendamiento de cita</h3>
				</div>

				
				<div class="col-12">
					<div class="p-3">
						<div>
							<?php 
								if(isset($_REQUEST['resul'])) 
								{
									if($_REQUEST['resul']=="si")
									{
										echo "<div class='alert alert-success'>Registro Exitoso.
										</div>";
									}
									if($_REQUEST['resul']=="no")
									{
										echo "<div class='alert alert-danger'>Registro No Exitoso.
										</div>";
									}
									if($_REQUEST['resul']=="autenticacion")
									{
										echo "<div class='alert alert-warning'> Debe Iniciar Sesion.
										</div>";
									}
								}
							?>
						</div>
						<form action="/veterinaria/controlador/agendaControlador.php">

							<div class="col-12 text-center mt-4">
								<h5>Información Mascota</h5>
							</div>	
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Nombre</label>
									<input type="text" class="form-control" placeholder="Nombre" name="nombre" required>
								</div>
								<div class="form-group col-md-6">
									<label>Fecha de Nacimiento</label>
									<input type="date" class="form-control" name="fechaNacimiento" required>
								</div>
								
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Tipo Mascota</label>
									<select class="form-control" name="tipoMascota" required>
										<option selected>[Seleccionar]</option>
										<?php
											$query = $conexion -> query ("SELECT * FROM tipoMascota");
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores[IdTipoMascota].'">'.$valores[Descripcion].'</option>';
											}
										?>
									</select>
								</div>
								<div class="form-group col-md-6">
									<label>Genero</label>
									<select  class="form-control" name="genero" required>
										<option selected>[Seleccionar]</option>
										<?php
											$query = $conexion -> query ("SELECT * FROM generoMascota");
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores[IdGeneroMascota].'">'.$valores[Descripcion].'</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Raza</label>
									<input type="text" class="form-control" placeholder="Raza" name="raza" required>
								</div>
								<div class="form-group col-md-6">
									<label>Peso (Kilos)</label>
									<input type="number" class="form-control" placeholder="Peso" name="peso">
								</div>
								
							</div>

							<div class="col-12 text-center mt-2">
								<h5>Información Servicio</h5>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<label>Tipo de Servicio</label>
									<select class="form-control" name="tipoServicio" required>
										<option selected>[Seleccionar]</option>
										<?php
											$query = $conexion -> query ("SELECT * FROM tipoServicio");
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores[IdTipoServicio].'">'.$valores[Descripcion].'</option>';
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Fecha de Agenda</label>
									<input type="date" class="form-control" name="fechaAgenda" required>
								</div>
								<div class="form-group col-md-6">
									<label>Sede</label>
									<select  class="form-control" name="sede" required>
										<option selected>[Seleccionar]</option>
										<?php
											$query = $conexion -> query ("SELECT * FROM sede");
											while ($valores = mysqli_fetch_array($query)) {
												echo '<option value="'.$valores[IdSede].'">'.$valores[Nombre].' - '.$valores[Direccion].'</option>';
											}
										?>
									</select>
								</div>
							</div>

							<button type="submit" class="btn btn-primary" name="agendar">Agendar Cita</button>
						</form>
						<div>
							<?php 
								if(isset($_REQUEST['resul'])) 
								{
									if($_REQUEST['resul']=="si")
									{
										echo "<div class='alert alert-success'>Registro Exitoso.
										</div>";
									}
									if($_REQUEST['resul']=="no")
									{
										echo "<div class='alert alert-danger'>Registro No Exitoso.
										</div>";
									}
									if($_REQUEST['resul']=="autenticacion")
									{
										echo "<div class='alert alert-warning'> Debe Iniciar Sesion.
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
