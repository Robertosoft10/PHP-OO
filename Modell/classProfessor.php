<?php 
class Professor{
    private $profId;
    private $nomeProf;
    private $disciplinaCod;

    public function __construct($profId=0, $nomeProf="", $disciplinaCod=""){
        $this->profId = $profId;
        $this->nomeProf = $nomeProf;
        $this->disciplinaCod = $disciplinaCod;
    }
    public function setProfId($profId){
       $this->profId = $profId;
    }
    public function getProfId(){
        return $this->profId;
    }
    public function setNomeProf($nomeProf){
        $this->nomeProf = $nomeProf;
     }
     public function getNomeProf(){
         return $this->nomeProf;
     }
     public function setDisciplinaCod($disciplinaCod){
        $this->disciplinaCod = $disciplinaCod;
     }
     public function getDisciplinaCod(){
         return $this->disciplinaCod;
     }
}
?>