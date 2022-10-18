<?php 

include "service/Usuario.php" ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <title>Avaliação PHP</title>
    </head>
    <body>
        <div class="container pt-3">
       
    <?php  
    if(isset($_SESSION['erros']) && count($_SESSION['erros'])){
        echo '<div class="alert alert-danger"><strong>Erros encontrados</strong><br>';
            foreach ($_SESSION['erros']as $key => $erro) {
                echo "<label class=''>$erro</label><br>";
            }
        echo '</div>';
        unset($_SESSION['erros']);
    }
    if(isset($_SESSION['msg'])){
        echo "<label class='alert alert-success'>{$_SESSION['msg']}</label><br>";
        unset($_SESSION['msg']);
    } 
    /* if(isset($_SESSION['usuario'])){
        extract($_SESSION['usuario']);
        unset($_SESSION['usuario']);
    }    */ 
    $id=$_GET['id'];
    $usr = new Usuario();
    $usuario=  $usr->getByid($id);
    extract($usuario);
    $password=null;
    $action="alterar.php";
    include 'form.php';
    ?>
       

       
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



