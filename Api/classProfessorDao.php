<?php
    require_once 'classConexao.php';
	include '../Modell/classProfessor.php';
	
	class ProfessorDAO{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	

        public function insertProfessor($professor){
            $nomeProf = $professor->getNomeProf();

            $sql = "INSERT INTO professores (nomeProf)VALUES('$nomeProf')";
            $this->conexao->query($sql);
        }
        public function listProfessores(){
            $consulta = $this->conexao->query("SELECT * FROM professores");
			    $arrayProfessores = array();
			    while ($linha = mysqli_fetch_array($consulta)) {
            $professor = new Professor($linha['profId'], $linha['nomeProf']);
				array_push($arrayProfessores, $professor);
			}
			return $arrayProfessores;
        }
        public function searchProfessor($profId){
            $linha = $this->conexao->buscarRegistro("SELECT * FROM professores WHERE profId = '$profId'"); 
            $professor = new Professor($linha['profId'], $linha['nomeProf']);
            return $professor;
        }
        public function updateProfessor($professor){
            
          $profId = $professor->getProfId();
          $nomeProf = $professor->getNomeProf();

            $sql = "UPDATE professores SET nomeProf='$nomeProf' WHERE profId='$profId'";
            $this->conexao->query($sql);
        }
        public function deleteProfessor($profId){
            $sql = "DELETE FROM professores WHERE profId = '$profId'";
            $this->conexao->query($sql);
        }
    }
?>