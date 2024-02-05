<?php
session_start(); //siempre que ocupemos sessiones debemos que llamara a esta función
require_once "../../../clases/Usuario.php";
$usuario = $_POST['login'];
$password = sha1($_POST['password']); //se lo encripta

$usuarioObj = new Usuario();

echo $usuarioObj -> login($usuario, $password);
?>