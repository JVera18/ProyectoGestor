<?php
require_once "../../../clases/Usuario.php"; //para que lea el archivo una sola vez y se detenga el proceso
//sha1 -> funcion para incriptar (en este caso la contraseña)
$password = sha1($_POST['password']);
$fechaNacimiento = explode("-", $_POST['fechaNacimiento']); //vamos a cortar a partir de los guiones
$fechaNacimiento = $fechaNacimiento[2]. "-" .$fechaNacimiento[1]. "-" .$fechaNacimiento[0]; 
//datos es igual a un arreglo
$datos = array(
    //lo aremos de forma asociativa, ¿Porque lo haremos así?: para evitar llamarlo por indices
    "nombre" => $_POST['nombre'],
    "fechaNacimiento" => $fechaNacimiento,
    "email" => $_POST['email'],
    "usuario" => $_POST['usuario'],
    "password" => $password
);

$usuario = new Usuario(); //de la clase usuario
echo $usuario->agregarUsuario($datos);
?>