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
            $disciplinaCod = $professor->getDisciplinaCod();

            $sql = "INSERT INTO professores (nomeProf, disciplinaCod)VALUES('$nomeProf', '$disciplinaCod')";
            $this->conexao->query($sql);
        }
        public function listProfessores(){
            $consulta = $this->conexao->query("SELECT * FROM professores");
			    $arrayProfessores = array();
			    while ($linha = mysqli_fetch_array($consulta)) {
            $professor = new Professor($linha['profId'], $linha['nomeProf'], $linha['disciplinaCod']);
				array_push($arrayProfessores, $professor);
			}
			return $arrayProfessores;
        }
        public function searchProfessor($profId){
            $linha = $this->conexao->buscarRegistro("SELECT * FROM professores WHERE profId = '$profId'"); 
            $professor = new Professor($linha['profId'], $linha['nomeProf'], $linha['disciplinaCod']);
            return $aluno;
        }
        public function updateProfessor($professor){
            
          $profId = $professor->getProfId();
          $nomeProf = $professor->getNomeProf();
          $disciplinaCod = $professor->getDisciplinaCod();

            $sql = "UPDATE professores SET nomeProf='$nomeProf', disciplinaCod='$disciplinaCod' WHERE profId='$profId'";
            $this->conexao->query($sql);
        }
        public function deleteProfessor($alunoId){
            $sql = "DELETE FROM professores WHERE profId = '$profId'";
            $this->conexao->query($sql);
        }
    }
?>