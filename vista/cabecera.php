<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <div class="row">
            <div class="col">
                <img src="/veterinaria/assets/imagenes/icono.png" width="60" height="60" class="d-inline-block align-top" alt="">
            </div>
            <div class="col pt-2 pl-0">
                <h1>PetCol</h1>
            </div>
        </div>
    </a>

    <div class="collapse navbar-collapse menu" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/veterinaria/index.php">Inicio<span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Servicios
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Centro de Belleza Animal</a>
                    <a class="dropdown-item" href="#">Medicina Veterinaria General</a>
                    <a class="dropdown-item" href="#">Vacunación Veterinaria</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Alimentos</a>
                    <a class="dropdown-item" href="#">Medicamentos</a>
                    <a class="dropdown-item" href="#">Accesorios</a>
                    <a class="dropdown-item" href="#">Juguetes</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/veterinaria/vista/agenda.php">Agenda tu cita<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Nosotros<span class="sr-only"></span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <div class="input-group buscar">
                <input type="search" class="form-control" placeholder="Buscar aqui ..." aria-label="Buscar" aria-describedby="basic-addon1">
                <div class="input-group-append">
                    <button class="btn  btn-outline-light" type="submit"><img src="/veterinaria/assets/imagenes/buscar.png" width="20" height="20" alt="Buscar" /></button>
                </div>
            </div>
        </form>
        <?php
            session_start();
            if(isset($_SESSION['usuario'])){
                echo '  <form method="post" action="/veterinaria/controlador/autenticacionControlador.php">
                            <div class="menu-usuario ml-2 dropdown">
                                <a class="dropdown-toggle" href="#" id="navbarDropdownMenuUsuario" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="/veterinaria/assets/imagenes/usuario.png" width="25" height="25" alt="Iniciar Sesión" />
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUsuario">
                                    <a class="dropdown-item" href="/veterinaria/vista/citas.php">Mis Citas</a>
                                    <button type="submit" class="btn btn-link dropdown-item" name="logout">Cerrar Sesión</button>
                                </div>
                            </div>
                        </form>';
            }else{
                echo '<button class="ml-1 btn btn-primary boton-login" data-toggle="modal" data-target="#usuarioModal">Iniciar Sesion</button>';
            }
        ?>
    </div>
</nav>


<!-- Modal -->
<div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Iniciar Sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            <div class="modal-body">
                <form action="/veterinaria/controlador/autenticacionControlador.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Correo electrónico</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Correo electrónico" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Contraseña" name="pass" required>
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox">
                            <span>Recordar usuario</span>
                        </label>
                    </div>
                    <?php 
                            if(isset($_REQUEST['errorLogin'])) 
                            {
                               
                                    echo "<div class='alert alert-danger'><strong>Error!</strong> Usuario o Contraseña Erroneo!!!!.
                                     </div>";
                              
                            }
                            ?>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">Login</button>
                    <div class="text-center">
                        <span class="helper-text"><i class="fa fa-lock"></i> <a href="#">¿Se te olvidó tu contraseña?</a></span>
                    </div><br>
                    <div class="text-center">
                        <span class="helper-text"><i class="fa fa-lock"></i> <a href="/veterinaria/vista/registro.php">Registrese</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
if(isset($_GET['errorLogin']) && !empty($_GET['errorLogin'])){
    echo '<script src="/veterinaria/assets/vendor/jquery/jquery.min.js"></script>';
    echo '<script src="/veterinaria/assets/vendor/bootstrap/js/bootstrap.min.js"></script>';
    echo '<script type="text/javascript">$("#usuarioModal").modal("show");</script>';
}
?>