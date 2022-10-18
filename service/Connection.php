<?php
class Connection{
    public $connect = null;
    public function __construct(){
        
        $host = "localhost";
        $dbname = "meuBD";
        $user= "root";
        $pass="pass";
        
        try {
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connect = $DBH;
            //return $DBH;
        }
        catch(PDOException $e) {

            echo 'ERROR: ' . $e->getMessage();
        }
    }
}


      /*   $db = new Connection();
    
        $sql = "SELECT * FROM aluno";
        $consulta = $db->connect->query($sql);
       
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo "Nome: {$linha['nome']} - Usuário: {$linha['dt_nascimento']}<br />";
        } */
       
?>