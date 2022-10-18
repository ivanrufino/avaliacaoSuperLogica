<form method="post" action="actions/<?php echo isset($action)? $action:"incluir.php" ?>">
            <?php if(isset($id_usuario)){
                 echo "<input type='hidden' id='id_usuario' name='id_usuario' readonly='readonly'  value='$id_usuario'>";
            }
            ?>
            <div class="row">
                <div class="col-md-4">
                    <label for="name" class="form-label">Nome completo:</label>
                    <input type="text" id="name" name="name"  class="form-control" value="<?php echo isset($name)?$name:''; ?>">
                </div>
                <div class="col-md-4">
                    <label for="userName" class="form-label">Nome de login:</label>
                    <input type="text" id="userName" name="userName"  class="form-control" value="<?php echo isset($userName)?$userName:''; ?>">
                </div>
          
                <div class="col-md-4">
                    <label for="zipCode" class="form-label">CEP</label>
                    <input type="text" id="zipCode" name="zipCode"  class="form-control" value="<?php echo isset($zipCode)?$zipCode:''; ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="email" class="form-label">Email:</label>
                    <input type="text" id="email" name="email"  class="form-control" value="<?php echo isset($email)?$email:''; ?>">
                </div>
                <div class="col-md-8">
                    <label for="password" class="form-label">Senha (8 caracteres mínimo, contendo pelo menos 1 letra e 1 número):</label>
                    <input type="password" id="password" name="password"  class="form-control">
                </div>
            </div>
            <div class="row pt-4">
                <div class="col-md-8">
                    <input type="submit" value="<?php echo isset($id_usuario)?'Alterar':'Cadastrar' ?>" class="btn btn-primary">
                    <a href="listaUsuario.php" class="btn btn-info">Lista de Usuários</a>
                </div>
            </div>
        </form>   