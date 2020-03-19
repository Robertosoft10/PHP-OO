<?php 
class Aluno{
    private $alunoId;
    private $nomeAluno;
    private $turno;
    private $serie;

    public function __construct($alunoId=0, $nomeAluno="", $turno="", $serie=""){
        $this->alunoId;
        $this->nomeAluno;
        $this->turno;
        $this->serie;
    }
    public function setAlunoId($alunoId){
       $this->alunoId = $alunoId;
    }
    public function getAlunoId(){
        return $this->alunoId;
    }
    public function setNomeAluno($nomeAluno){
        $this->nomeAluno = $nomeAluno;
     }
     public function getNomeAluno(){
         return $this->nomeAluno;
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