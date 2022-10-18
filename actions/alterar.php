<?php
include "../service/Usuario.php" ;
$usr = new Usuario();
$usr->alterar($_POST);

header("Location: ../editar.php?id={$_POST['id_usuario']}"); 
?>