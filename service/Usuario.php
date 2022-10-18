<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'Connection.php';
include 'Validates.php';
class Usuario extends Connection{
    
    public $erros=[];
    public $msg=null;
    public $gravado=false;
    public function __construct(){       
        parent::__construct();
       
    }
   /**
     * Realiza a validação dos campos enviado
     * 
     * @param  array   $usuario, array contendo nomes e valores do campos do formulario
     */
    public function validate($usuario){
        
        $_SESSION['usuario'] =$usuario;
        $validate = new Validate($usuario);
        $_SESSION['erros'] = $validate->getErros();        
     
    }
    /**
     * Realiza a insercao no banco de dados
     * @param  array   $usuario, array contendo nomes e valores do campos do formulario
    
     */
    public function incluir($usuario){
        try {
            $this->validate($usuario);
            if(count($_SESSION['erros'])==0){
                $sql = "INSERT INTO usuario (name, userName, zipCode, email, password) 
                VALUES(:name,:userName, :zipCode, :email, :password)";
                $sth = $this->connect->prepare($sql);
                $sth->execute(array(
                    ':name'       => $usuario['name'],
                    ':userName'   => $usuario['userName'],
                    ':zipCode'    => $usuario['zipCode'],
                    ':email'      => $usuario['email'],
                    ':password'   => md5($usuario['password'])

                ));
                unset($_SESSION['usuario']);
                $this->gravado=true;
                $_SESSION['msg']="Usuário gravado com sucesso";
            }
        } catch (PDOException $th) {
            $this->erros[]="Houve uma falha na gravação, por favor contacte o administrador";
        }
    }
     /**
     * Realiza a alteracao do usuario no banco de dados
     * @param  array   $usuario, array contendo nomes e valores do campos do formulario
    
     */
    public function alterar($usuario){
        try {
            $this->validate($usuario);
            if(count($_SESSION['erros'])==0){
               // $sql = "INSERT INTO usuario (name, userName, zipCode, email, password) 
               //VALUES(:name,:userName, :zipCode, :email, :password)";
                $sql = "UPDATE usuario set name=:name, userName=:userName, zipCode=:zipCode, email=:email, password=:password where id_usuario=:id_usuario";
                $sth = $this->connect->prepare($sql);
                $sth->execute(array(
                    ':id_usuario'       => $usuario['id_usuario'],
                    ':name'       => $usuario['name'],
                    ':userName'   => $usuario['userName'],
                    ':zipCode'    => $usuario['zipCode'],
                    ':email'      => $usuario['email'],
                    ':password'   => md5($usuario['password'])

                ));
                unset($_SESSION['usuario']);
                $this->gravado=true;
                $_SESSION['msg']="Usuário alterado com sucesso";
            }
        } catch (PDOException $th) {
            $this->erros[]="Houve uma falha na gravação, por favor contacte o administrador";
        }
    }
    /**
     * Realiza a exclusao lógica do usuário
     * 
     * @param  string   $id, id do usuario a ser excluido
     */
    public function excluir($id){
        try {
            $sql = "UPDATE usuario set ativo =:ativo where id_usuario=:id_usuario";
            
            $sth = $this->connect->prepare($sql);
            $sth->execute(array(
                ':ativo'      => 0,
                ':id_usuario'   => $id,  
            ));
            $_SESSION['msg']="Usuário removido com sucesso";
        } catch (PDOException $th) {
            $this->erros[]="Houve uma falha na gravação, por favor contacte o administrador";
        }

    }
    /**
     * Lista os usuário ativos (sem exclusao lógica)
     * 
     */
    public function listar(){
        $sql = "SELECT * FROM usuario where ativo =1 order by id_usuario desc";
        $sth = $this->connect->prepare($sql);
        $sth->execute();
        $result =$sth->fetchAll(PDO::FETCH_ASSOC);
        return $result ;
      
    }
    /**
     * Obtem usuario pelo id
     * 
     * @param  int   $id, id do usuario
     */
    public function getByid($id){
        $sql = "SELECT * FROM usuario where id_usuario =:id_usuario";
        $sth = $this->connect->prepare($sql);
        $sth->execute(array(
            ':id_usuario'   => $id,  
        ));
        $result =$sth->fetch(PDO::FETCH_ASSOC);
        return $result ;
    }

   

}
?>