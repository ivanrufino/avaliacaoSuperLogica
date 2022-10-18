<?php 
include "service/Usuario.php" ;
$usr = new Usuario();
$usuarios=  $usr->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Lista Usuarios</title>
</head>
<body>
    <div class="container pt-3">
        <a href="index.php" class="btn btn-info">Incluir Usuário</a>

        <div class="row">
        <?php
        if(isset($_SESSION['msg'])){
          
            echo "<label class='alert alert-success'>{$_SESSION['msg']}</label><br>";
            unset($_SESSION['msg']);
        }?>
        </div>
        <table class='table'>
            <thead>
                <tr>
                <th>Nome Completo</th>
                <th>Nome de Login</th>
                <th>Cep</th>
                <th>Email</th>                
                <th></th>
                <th></th>

                </tr>
            </thead>
            
            <tbody>
                <?php
                foreach ($usuarios as $key => $usuario) {
                echo "<tr><td>{$usuario['name']}</td>
                <td>{$usuario['userName']}</td>
                <td>{$usuario['zipCode']}</td>
                <td>{$usuario['email']}</td>
                <td><a href='editar.php?id={$usuario['id_usuario']}' class='btn btn-success'> Editar </a></td>
                <td><a href='actions/excluir.php?id={$usuario['id_usuario']}' class='btn btn-danger'> Excluir </a></td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
     <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>
