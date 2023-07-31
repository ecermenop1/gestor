<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

<body style="background-color: #7D7C7B">


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
                    <li class="nav-item">
                        <a class="nav-link" href="registro.php"> <span class="fas fa-user-plus"></span> Rigistra
                            Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php"> <span class="fas fa-file"></span> Categorias</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            CATEGORIAS
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="paises.php">Paises</a>
                            <a class="dropdown-item" href="departamentos.php">Departamentos</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestor.php"> <span class="far fa-folder"></span> Archivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ocr.php"> <span class="far fa-file-pdf"></span> OCR</a>
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