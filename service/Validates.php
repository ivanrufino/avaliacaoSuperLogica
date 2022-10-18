<?php
class Validate {
    private $erros;
    public function __construct($campos){
        $this->campos = $campos;

        $this->validateName();
        $this->validateUserName();
        $this->validateZipCode();
        $this->validateEmail();
        $this->validatePassword();
        
    }
    public function getErros(){
        return $this->erros;
    }
    private function validateName(){
        $this->checkIfExiste($this->campos['name'],'Nome Completo');
        $this->minLength($this->campos['name'],3,'Nome Completo');
    }
    private function validateUserName(){
        $this->checkIfExiste($this->campos['userName'],'Nome de Login');
        $this->minLength($this->campos['userName'],3,'Nome de Login');
        $this->checkSpecialChar($this->campos['userName'],'Nome de Login');
    }
    private function validateZipCode(){
        $this->checkIfExiste($this->campos['zipCode'],'Cep');
        $this->minLength($this->campos['zipCode'],9,'Cep',"Campo Cep precisa de 9 caracteres e estar no padrao xxxxx-xxx");
        $this->checkIsCEP($this->campos['zipCode'],"Campo Cep não é válido precisa estar no padrao xxxxx-xxx");       
    }
    private function validateEmail(){
        $this->checkIfExiste($this->campos['email'],'Email');
        $this->checkIsEmail($this->campos['email']);
    }
    private function validatePassword(){
        $this->checkIfExiste($this->campos['password'],'Senha');
        $this->minLength($this->campos['password'],8,'Senha');
        $this->checkValidPassword($this->campos['password']);
       
    }



    private function checkIfExiste($valor,$nome_campo,$mensagem=null){
       if(!isset($valor) || trim($valor) ==""){
            $this->erros[]=$mensagem==null?"Campo $nome_campo é obrigatório":$mensagem;
        }   
        return true;
    }
    private function minLength($campo,$min,$nome_campo,$mensagem=null){
        if (strlen($campo)<$min && strlen($campo)>0){
            $this->erros[]=$mensagem==null?"Campo $nome_campo precisa ter minimo de $min caracteres":$mensagem;
        }
        return true;
    }
    private function checkIsEmail($valor,$mensagem=null){
        if(!filter_var($valor, FILTER_VALIDATE_EMAIL) &&  trim(strlen($valor))>0) {
            $this->erros[]=$mensagem==null?"Campo Email não é um email válido":$mensagem;
        }   
    }
    private function checkIsCEP($valor,$mensagem=null){
        if(!preg_match("/^[0-9]{5}-[0-9]{3}$/i",$valor) &&  strlen($valor)==9){
            $this->erros[]=$mensagem==null?"Campo CEP não é um CEP válido":$mensagem;
        }
    }
    private function checkSpecialChar($valor,$nome_campo,$mensagem=null){
        if(!preg_match("/^[a-z0-9\s\-_]+$/i",$valor) &&  trim(strlen($valor))>8){
            $this->erros[]=$mensagem==null?"Campo $nome_campo não permite caracteres especiais":$mensagem;
        }
    }
    private function checkValidPassword($valor,$mensagem=null){
        if(!preg_match("/(?=.*[a-zA-Z])(?=.*[0-9])/i",$valor) &&  trim(strlen($valor))>8){ //(?=.*[a-zA-Z])
            $this->erros[]=$mensagem==null?"Campo Senha deve conter pelo menos 1 letra e 1 número":$mensagem;
        }
    }
}
?>