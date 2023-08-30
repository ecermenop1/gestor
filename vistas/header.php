<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//session_start();

    $RolUsuario=$_SESSION['RolUsuario'];
   // echo $RolUsuario;
?>


<!DOCTYPE html>
<html>

<head>
    <title>Gestor</title>
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap4/bootstrap.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">
</head>

<body style="background-color: #e9ecef">


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../img/Logo PNC.png" alt="" width="50px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="inicio.php"> <span class="fas fa-home"></span> Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <?php
                    if($RolUsuario=="ADMINISTRADOR"){
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php"> <span class="fas fa-user-plus"></span> Rigistra
                            Usuario</a>
                    </li>
                    <?php
                     }
                    ?>
                   <!-- <li class="nav-item">
                        <a class="nav-link" href="categorias.php"> <span class="fas fa-file"></span> Categorias</a-->

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            CATEGORIAS
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="paises.php">Paises</a>
                            <a class="dropdown-item" href="departamentos.php">Departamentos</a>
                            <a class="dropdown-item" href="municipios.php">Municipios</a>
                            <a class="dropdown-item" href="lugarespoblados.php">Lugares Poblados</a>
                            <a class="dropdown-item" href="medidor.php">Medidor</a>
                            <a class="dropdown-item" href="direcciones.php">Direcciones</a>
                            <a class="dropdown-item" href="personas.php">Personas</a>
                            <a class="dropdown-item" href="vehiculo.php">Vehiculos</a>
                            <a class="dropdown-item" href="caso.php">Casos</a>
                          
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestor.php"> <span class="far fa-folder"></span> Archivos</a>
                    </li>
                  

                    <li class="nav-item">
                        <a class="nav-link" href="../procesos/usuario/salir.php" style="color: red">
                            <span class="fas fa-power-off"></span> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>