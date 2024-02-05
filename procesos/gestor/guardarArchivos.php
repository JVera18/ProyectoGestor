<?php 
    session_start();
    require_once "../../clases/Gestor.php";
    $Gestor = new Gestor();
    $idCategoria = $_POST['categoriasArchivos'];
    $idUsuario = $_SESSION['idUsuario'];

//todos los archivos se guardaran en la variable "$totalArchivos"
if ($_FILES['archivos']['size'] > 0) {

    $carpetaUsuario = '../../archivos/'.$idUsuario;

    if(!file_exists($carpetaUsuario)){
        mkdir($carpetaUsuario, 0777, true);
    }

    $totalArchivos = count($_FILES['archivos']['name']);
    for ($i = 0; $i < $totalArchivos; $i++) {
        //control-atributo e indice
        $nombreArchivo = $_FILES['archivos']['name'][$i];
        $explode = explode('.', $nombreArchivo);
        $tipoArchivo = array_pop($explode);

        $rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i]; //en el "tmp_name" se almacenaran las rutas 
        $rutaFinal = $carpetaUsuario . "/" . $nombreArchivo;

        $datosRegistroArchivo = array(
                                    "idUsuario" => $idUsuario,
                                    "idCategoria" => $idCategoria,
                                    "nombreArchivo" => $nombreArchivo,
                                    "tipo" => $tipoArchivo,
                                    "ruta" => $rutaFinal);

        if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
            $respuesta = $Gestor->agregaRegistroArchivo($datosRegistroArchivo);
        }
    }
    echo $respuesta;
} else {
    echo 0;
}
?>