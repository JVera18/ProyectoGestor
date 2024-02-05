<?php
session_start();

if (isset($_SESSION['usuario'])) { //isset: si esta esta definida va a permitir que ingresen
    include "header.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="jumbotron" style="text-align: center;">
                    <h1 class="display-4">Gestor de archivos con php y mysql</h1>
                    <p class="lead">Aplicación web encargada de gestionar archivos, por medio de categorías.</p>
                    <hr class="my-4">
                    <img src="../img/Miproyecto.png" alt="..." height="200"><br><br>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="categorias.php" role="button">Ir a categorías</a>
                    </p>
                </div>
                
            </div>
        </div>
    </div>

<?php
    include "footer.php";
} else {
    header("location:../index.php");
}
?>