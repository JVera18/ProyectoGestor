<?php
    require_once "Conexion.php";
    class Usuario extends Conectar{

        public function agregarUsuario($datos) {
            $conexion = Conectar::conexion();

            $sql = "INSERT INTO gg_usuarios (nombre, fechaNacimiento, email, usuario, password) VALUES (?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssss', $datos['nombre'], $datos['fechaNacimiento'], $datos['email'], $datos['usuario'], $datos['password']);
            $exito = $query->execute();
            $query->close();

            return $exito; //exito: responde solo con un 0 o 1 
        }
        //corregir el registro repetido
        public function buscarUsuarioRepetido($usuario) {
            $conexion = Conectar::conexion();
    
            $sql = "SELECT id_usuario FROM gg_usuarios WHERE usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('s', $usuario);
            $query->execute();
            $query->store_result();
            $num_rows = $query->num_rows;
            $query->close();
    
            return $num_rows > 0;
        }
    
        public function login($usuario, $password) {
            $conexion = Conectar::conexion();
    
            $sql = "SELECT id_usuario FROM gg_usuarios WHERE usuario = ? AND password = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario, $password);
            $query->execute();
            $query->store_result();
            $num_rows = $query->num_rows;
    
            if ($num_rows > 0) {
                $_SESSION['usuario'] = $usuario;
                $query->bind_result($idUsuario);
                $query->fetch();
                $_SESSION['idUsuario'] = $idUsuario;
                $query->close();
                return 1;
            } else {
                $query->close();
                return 0;
            }
        }
    }
?>