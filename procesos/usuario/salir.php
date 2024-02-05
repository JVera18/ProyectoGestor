<?php 
session_start(); //nos deja usar las sessiones
session_destroy(); //despues elimina toodas las sessiones

header('location:../../index.php');

?>