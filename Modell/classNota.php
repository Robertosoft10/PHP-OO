<?php
class Nota{
    private $notaId;
    private $aluno;
    private $professor;
    private $disciplina;
    private $bimestre;
    private $nota;
    public function __construct($notaId=0, $aluno="", $professor="", $disciplina="", $bimestre="", $nota=""){
        $this->$notaId = $notaId;
        $this->$aluno = $aluno;
        $this->$professor = $professor;
        $this->$disciplina = $disciplina;
        $this->$bimestre = $bimestre;
        $this->$nota = $nota;
    }
    public function setNotaId($notaId){
       $this->notaId = $notaId;
    }
    public function getAluno(){
        return $this->notaId;
    }
    public function setAluno($aluno){
        $this->aluno = $aluno;
     }
     public function getNomeAluno(){
         return $this->aluno;
     }
     public function setProfessor($professor){
        $this->professor = $professor;
     }
     public function getProfessor(){
         return $this->professor;
     }
     public function setDisciplina($disciplina){
        $this->disciplina = $disciplina;
     }
     public function getDisciplina(){
         return $this->disciplina;
     }
     public function setBimestre($bimestre){
        $this->bimestre = $bimestre;
     }
     public function getBimestre(){
         return $this->bimestre;
     }
     public function setNota($nota){
        $this->nota = $nota;
     }
     public function getNota(){
         return $this->nota;
     }
}
?>
