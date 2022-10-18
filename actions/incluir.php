<?php
include "../service/Usuario.php" ;
$usr = new Usuario();
$usr->incluir($_POST);

header("Location: ../index.php"); 

?>