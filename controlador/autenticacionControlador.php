<?php

$callback = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
  $url = explode(".php", $_SERVER['HTTP_REFERER']);
  $callback = $url[0];

  if(sizeof($url)==1){
    $callback .= "index.php";
  }else{
    $callback .= ".php";
  }
}

include "../modelo/conexiondb.php";
    
if(isset($_REQUEST['login']))
{
  $usuario=$_REQUEST['email'];
  $contrasena=$_REQUEST['pass'];

  $registros = mysqli_query($conexion,"select UserName,Password,IdUsuario from usuario where UserName='$usuario'") or
  die("Problemas en el select:" . mysqli_error($conexion));
 
  if($registros->num_rows > 0)
  { 
    $captura = $registros->fetch_array();

    if (password_verify($contrasena,$captura["Password"]))
    {
      session_start();
      // Guardar datos de sesión
      $_SESSION["usuario"] = $captura["IdUsuario"];
      header("Location: $callback"); // donde error es la variable a pasar   
    }
    else
    {
      $error="error";
      header("Location: $callback?errorLogin=$error"); // donde error es la variable a pasar
    }   
  }
  else
  {
      $error="reg";
      header("Location: $callback?errorLogin=$error"); // donde error es la variable a pasar
  }
 
}

if(isset($_REQUEST['logout']))
{
  session_start();
  unset($_SESSION['usuario']);
  session_destroy ();
  header("Location: $callback"); // donde error es la variable a pasar
}

if(isset($_REQUEST['registro']))
{
 
    $usuario=$_REQUEST['email'];
    $contrasena=$_REQUEST['contrasena'];
  
    $contrasena = password_hash($contrasena,PASSWORD_DEFAULT); //Encriptación de la contraseña digitada

    $registros = mysqli_query($conexion,"select UserName from usuario where UserName='$usuario'") or
    die("Problemas en el select:" . mysqli_error($conexion));

    if($registros->num_rows > 0)
     { 
      $pf="existe";
      header("Location: ../vista/registro.php?resul=$pf"); // donde error es la variable a pasar
    }
    else{

      $query="INSERT INTO usuario(UserName, 
                                  Password, 
                                  Nombre, 
                                  Apellido, 
                                  Direccion, 
                                  IdTipoDocumento, 
                                  Identificacion, 
                                  IdGenero, 
                                  Email, 
                                  Estado, 
                                  IdRol)
              values ('".$usuario."',
                      '".$contrasena."',
                      '".$_REQUEST['nombre']."',
                      '".$_REQUEST['apellido']."',
                      '".$_REQUEST['direccion']."',
                      ".$_REQUEST['tipoDocumento'].",
                      '".$_REQUEST['identificacion']."',
                      ".$_REQUEST['genero'].",
                      '".$_REQUEST['email']."',
                      1,
                      2)";

      echo $query;

      $resultado=mysqli_query($conexion, $query) or die("Problemas en el insert" . mysqli_error($conexion));
  
      if ($resultado) {
         $pf="si";
      }
      else
      {
          $pf="no";
      }
      
      header("Location: ../vista/registro.php?resul=$pf"); // donde error es la variable a pasar
    }
}
    
mysqli_close($conexion);

?>