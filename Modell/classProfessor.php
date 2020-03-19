<?php 
class Professor{
    private $profId;
    private $nomeProf;

    public function __construct($profId=0, $nomeProf=""){
        $this->profId = $profId;
        $this->nomeProf = $nomeProf;
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
}
?>