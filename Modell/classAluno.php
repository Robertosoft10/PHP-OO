<?php 
class Aluno{
    private $alunoId;
    private $nome;
    private $turno;
    private $serie;

    public function __construct($alunoId=0, $nome="", $turno="", $serie=""){
        $this->alunoId;
        $this->nome;
        $this->turno;
        $this->serie;
    }
    public function setAlunoId($alunoId){
       $this->alunoId = $alunoId;
    }
    public function getAlunoId(){
        return $this->alunoId;
    }
    public function setNome($nome){
        $this->nome = $nome;
     }
     public function getNome(){
         return $this->nome;
     }
     public function setTurno($turno){
        $this->turno = $turno;
     }
     public function getTurno(){
         return $this->turno;
     }
     public function setSerie($serie){
        $this->serie = $serie;
     }
     public function getSerie(){
         return $this->serie;
     }
}
?>