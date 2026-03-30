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
					<h3>Mis Citas</h3>
				</div>

				
				<div class="col-12">
					<div class="p-3">
						<table class="table">
							<thead class="thead-dark">
								<tr class="bg-success">
								<th scope="col">Mascota</th>
								<th scope="col">Fecha Agenda</th>
								<th scope="col">Tipo Servicio</th>
								<th scope="col">Sede</th>
								<th scope="col">Estado</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if(isset($_SESSION['usuario'])){
										$query = $conexion -> query ("SELECT
																		m.Nombre AS 'Mascota',
																		c.Fecha,
																		ts.Descripcion AS 'TipoServicio',
																		s.Nombre as 'Sede',
																		e.Descripcion as 'Estado'
																	FROM
																		cita c
																	LEFT OUTER JOIN mascota m ON
																		m.IdMascota = c.IdMascota
																	LEFT OUTER JOIN tiposervicio ts ON
																		ts.IdTipoServicio = c.IdTipoServicio
																	LEFT OUTER JOIN sede s ON
																		s.IdSede = c.IdSede
																	LEFT OUTER JOIN estadocita e ON
																		e.IdEstadoCita = c.IdEstadoCita
																	WHERE m.IdUsuario = ".$_SESSION["usuario"]);
										while ($valores = mysqli_fetch_array($query)) {
											echo '<tr>';
											echo '<td>'.$valores["Mascota"].'</td>';
											echo '<td>'.$valores["Fecha"].'</td>';
											echo '<td>'.$valores["TipoServicio"].'</td>';
											echo '<td>'.$valores["Sede"].'</td>';
											echo '<td>'.$valores["Estado"].'</td>';
											echo '</tr>';
										}
									}
								?>
							</tbody>
						</table>
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
