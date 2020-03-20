<?php 
class Usuario{
    private $userId;
    private $nomeUser;
    private $email;
    private $password;
    private $tipo;
    private $status;

    public function __construct($userId=0, $nomeUser="", $email="", $password="", $tipo="" , $status=""){
        $this->userId = $userId;
        $this->nomeUser = $nomeUser;
        $this->email = $email;
        $this->password = $password;
        $this->tipo = $tipo;
        $this->status = $status;
    }
    public function setUserId($userId){
       $this->userId = $userId;
    }
    public function getUserId(){
        return $this->userId;
    }
    public function setNomeUser($nomeUser){
        $this->nomeUser = $nomeUser;
     }
     public function getNomeUser(){
         return $this->nomeUser;
     }
     public function setEmail($email){
        $this->email = $email;
     }
     public function getEmail(){
         return $this->email;
     }
     public function setPassword($password){
        $this->password = $password;
     }
     public function getPassword(){
         return $this->password;
     }
     public function setTipo($tipo){
        $this->tipo = $tipo;
     }
     public function getTipo(){
         return $this->tipo;
     }
     public function setStatus($status){
        $this->status = $status;
     }
     public function getStatus(){
        return $this->status;
     }
}
?>