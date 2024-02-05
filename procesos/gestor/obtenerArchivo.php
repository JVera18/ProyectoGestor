<?php 
    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo']; //asi lo tenemos en el gestor.js (en el ajax)

    echo $Gestor->obtenerRutaArchivo($idArchivo);

?>