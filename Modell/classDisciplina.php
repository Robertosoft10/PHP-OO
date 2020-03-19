<?php 
class Disciplina{
    private $disciId;
    private $disciplina;

    public function __construct($disciId=0, $disciplina=""){
        $this->disciId = $disciId;
        $this->disciplina = $disciplina;
    }
    public function setDisciId($disciId){
       $this->disciId = $disciId;
    }
    public function getDisciId(){
        return $this->disciId;
    }
    public function setDisciplina($disciplina){
        $this->disciplina = $disciplina;
     }
     public function getDisciplina(){
         return $this->disciplina;
     }
}
?>