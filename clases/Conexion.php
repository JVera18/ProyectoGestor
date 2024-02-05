<?php
class Conectar {
    public function conexion() {
        $servidor = "localhost";
        $usuario = "root";
        $password = "";
        $base = "gestor";

        $conexion = new mysqli($servidor, $usuario, $password, $base);

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $conexion->set_charset('utf8mb4');
        return $conexion;
    }
}
?>
