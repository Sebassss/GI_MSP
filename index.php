<?php
/**
 * Created by PhpStorm.
 * User: Calopsia
 * Date: 15/12/2016
 * Time: 15:37
 */
/**
* Incluyo las librerias necesarias
*/

include('core/db/db.inc.php');
include('core/db/class.conexion.php');
include('core/db/class.permisos.php');
include('core/db/class.generamenu.php');




/**
* Instanciamos la clase de permisos
*/
//$obj_permiso = new Permiso();

/**
* Le pasamos el id del usuario y el recuros a validar
*/
//$permiso = $obj_permiso->validarPermiso(1,6);

/**
* Validamos si el usuario puede crear una noticia
*/
/*
if( $permiso->agregar == 1){
    /**
    * Logica para crear las noticias
    */
/*
    echo 'Tiene permisos';
}
else
{
    echo 'No Tiene permisos';
}
$obj_permiso->desconectar();
*/
?>


<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GI - Gestión de Incidencias</title>

    <link rel="stylesheet" href="framework/css/bootstrap.min.css">
    <link rel="stylesheet" href="framework/css/font-awesome.css">
    <link rel="stylesheet" href="framework/css/style.css">
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <strong>Interno Desarrollo: </strong>4305575
                &nbsp;&nbsp;
                <strong>Interno Soporte: </strong>4305619
            </div>

        </div>
    </div>
</header>
<!-- HEADER END-->
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" />
            </a>
        </div>
        <div class="left-div">
            <div class="user-settings-wrapper">
                <ul class="nav">

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-settings">
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img src="img/64-64.jpg" alt="" class="img-rounded" />
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Jhon Deo Alex </h4>
                                    <h5>Developer & Designer</h5>
                                </div>
                            </div>
                            <hr />
                            <h5><strong>Personal Bio : </strong></h5>
                            Anim pariatur cliche reprehen derit.
                            <hr />
                            <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar">

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <?php
                        echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">';
                       /*Genero Menu Segun usuario*/
                        $obj_menu = new Menu();
                        $obj_menu->GeneraMenu(0,1,3);
                        $obj_menu->desconectar();
                        echo '</ul></div><!-- /.navbar-collapse -->';

                        /*Fin generacion de menu*/
                        ?>
                    </div><!-- /.container-fluid -->
                </nav>
            </div>

        </div>
    </div>
</section>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div id="main" class="container">

    </div>
</div>
<!-- CONTENT-WRAPPER SECTION END-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        &copy; 2016 Area de Sistema Salud Pública | By  Sebas: <a href="#" target="_blank">pseba20@gmail.com</a>
                    </div>
                </div>
            </div>
        </footer>
    <!-- Scripts -->
    <script src="framework/js/jquery-2.2.3.js"></script>
    <script src="framework/js/bootstrap.js"></script>
    <script src="core/js/grid/Grid/Grid.js"></script>
    <script src="core/js/functions.js"></script>

</body>
</html>
