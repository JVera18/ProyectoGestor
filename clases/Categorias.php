<?php 
    require_once "Conexion.php";
    class Categorias extends Conectar{
        public function agregarCategoria($datos){
            $conexion = Conectar::conexion();

            $sql = "INSERT INTO gg_categorias (id_usuario, nombre) VALUES (?, ?)";
            $query = $conexion -> prepare($sql);
            $query->bind_param("is", $datos['idUsuario'], $datos['categoria']);
            
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }

        public function eliminarCategoria($idCategoria){
            $conexion = Conectar::conexion();
            
            $sql = "DELETE FROM gg_categorias WHERE id_categorias = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idCategoria); //la "i" es el significado que se le da a un entero
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        //obtendremos el id de la categoria y el nombre
        public function obtenerCategoria($idCategoria){
            $conexion = Conectar::conexion();

            $sql = "SELECT id_categorias, nombre FROM gg_categorias WHERE id_categorias = '$idCategoria'";
            $result = mysqli_query($conexion, $sql);

            $categoria = mysqli_fetch_array($result);
            //lo estamos convirtiendo en un JSON
            $datos = array("idCategoria" => $categoria['id_categorias'],"nombreCategoria" => $categoria['nombre']);
            return $datos;
        }

        public function actualizarCategoria($datos){
            $conexion = Conectar::conexion();

            $sql = "UPDATE gg_categorias SET nombre = ? WHERE id_categorias = ?"; //es una sentencia preparada
            $query = $conexion->prepare($sql);
            $query->bind_param("si", $datos['categoria'],
                                    $datos['idCategoria']); //los nombres dentro del arreglo datos se encuentran en vistas>categorias.php
            $respuesta = $query->execute();
            $query->close();
            
            return $respuesta;
        }
    }
?>