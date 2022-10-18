<?php
include "../service/Usuario.php" ;
$id=$_GET['id'];
$usr = new Usuario();
 $usr->excluir($id);
header("Location: ../listaUsuario.php"); 
?>