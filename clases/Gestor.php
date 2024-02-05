<!-- Este metodo solo va a guardar un registro a la base de 
    datos que va relacionada al archivo que va relacionada al formulario -->
<?php
require_once "Conexion.php";
class Gestor extends Conectar
{
    public function agregaRegistroArchivo($datos)
    {
        $conexion = Conectar::conexion();
        $sql = "INSERT INTO gg_archivos(id_usuario, id_categorias, nombre, tipo, ruta) VALUES(?, ?, ?, ?, ?)";
        $query = $conexion->prepare($sql); //para evitar inyecciones sql
        $query->bind_param(
            "iisss",
            $datos['idUsuario'],
            $datos['idCategoria'],
            $datos['nombreArchivo'],
            $datos['tipo'],
            $datos['ruta']
        );
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtenNombreArchivo($idArchivo){
        $conexion = Conectar::conexion();
        $sql = "SELECT nombre FROM gg_archivos WHERE id_archivos = '$idArchivo'";
        $result = mysqli_query($conexion, $sql);

        return mysqli_fetch_array($result)['nombre'];//el nombre es para acceder a la ruta
    }

    public function eliminarRegistroArchivo($idArchivo){
        $conexion = Conectar::conexion();
        $sql = "DELETE FROM gg_archivos WHERE id_archivos = ?";//hacemos esto para evitar inyecciones sql
        $query = $conexion->prepare($sql);
        $query->bind_param('i',$idArchivo);
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }

    public function obtenerRutaArchivo($idArchivo){
        $conexion = Conectar::conexion();

        $sql = "SELECT nombre, tipo FROM gg_archivos WHERE id_archivos = '$idArchivo'";
        $result = mysqli_query($conexion, $sql);
        $datos = mysqli_fetch_array($result);
        $nombreArchivo = $datos['nombre'];
        $extension = $datos['tipo'];
        return self::tipoArchivo($nombreArchivo, $extension);
    }

    public function tipoArchivo($nombre, $extension)
    {
        $idUsuario = $_SESSION['idUsuario'];

        $ruta = "../archivos/".$idUsuario."/".$nombre;
        switch ($extension) {
            case 'png':
                return '<img src="'.$ruta.'" width="100%" height="600px">'; //esto nos regresa un html (como lo demuestra en el gestor.js)
                break;

            case 'jpg':
                return '<img src="'.$ruta.'" width="100%" height="600px">';
                break;

            case 'jpeg':
                return '<img src="'.$ruta.'" width="100%" height="600px">';
                break;
                
            case 'pdf':
                return '<embed src="' .$ruta. '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" 
                        width="100%" height="600px" />';
                break;

            case 'mp3':
                return '<audio controls src="' .$ruta. '"></audio>';
                break;

            case 'mp4':
                return '<video src="' .$ruta. '" controls width="100%" height="600px"></video>' ;
                break;

            default:
                # code...
                break;
        }
    }
}
?>