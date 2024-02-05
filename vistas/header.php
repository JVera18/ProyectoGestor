<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- para hacerlo responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../librerias/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../librerias/datatable/dataTables.bootstrap4.min.css">
    <link rel="icon" href="../img/logoC.png"/>
    <title>Gestor</title>
</head>

<body style="background-color: #e9ecef;">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top fixed-top" id="menu-fixed">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../img/logoC.png" alt="..." height="36" width="50px">
            </a>
            <!-- permite que sea un boton responsive -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="inicio.php"> <span class="fa-sharp fa-solid fa-house-chimney"></span> Inicio
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php"><span class="fa-sharp fa-solid fa-file"></span> Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestor.php"><span class="fa-solid fa-folder"></span> Archivos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../procesos/usuario/salir.php" style="color: red">
                            <span class="fa-solid fa-power-off"></span> Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>