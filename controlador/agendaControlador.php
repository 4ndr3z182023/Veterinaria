<?php
include "../modelo/conexiondb.php";
    
if(isset($_REQUEST['agendar']))
{
    session_start();
    if(!isset($_SESSION['usuario']))
     { 
      $pf="autenticacion";
      header("Location: ../vista/agenda.php?resul=$pf"); 
    }
    else{
      $query="INSERT INTO mascota(Nombre, 
                                  FechaNacimiento, 
                                  Raza, 
                                  Peso, 
                                  IdTipoMascota, 
                                  IdGeneroMascota,
                                  IdUsuario)
              values ('".$_REQUEST['nombre']."',
                      '".$_REQUEST['fechaNacimiento']."',
                      '".$_REQUEST['raza']."',
                      '".$_REQUEST['peso']."',
                      ".$_REQUEST['tipoMascota'].",
                      ".$_REQUEST['genero'].",
                      ".$_SESSION["usuario"].")";

      echo $query;

      $resultado=mysqli_query($conexion, $query) or die("Problemas en el insert" . mysqli_error($conexion));
  
      if ($resultado) {
        $query="INSERT INTO cita(Fecha,
                                IdMascota, 
                                IdTipoServicio, 
                                IdSede, 
                                IdEstadoCita)
                values ('".$_REQUEST['fechaAgenda']."',
                ".mysqli_insert_id($conexion).",
                '".$_REQUEST['tipoServicio']."',
                '".$_REQUEST['sede']."',
                1)";

        echo $query;

        $resultado=mysqli_query($conexion, $query) or die("Problemas en el insert" . mysqli_error($conexion));

        if ($resultado) {
          $pf="si";
        }
        else
        {
          $pf="no";
        }
      }
      else
      {
        $pf="no";
      }
      
      header("Location: ../vista/agenda.php?resul=$pf"); // donde error es la variable a pasar
    }
}
    
mysqli_close($conexion);

?>