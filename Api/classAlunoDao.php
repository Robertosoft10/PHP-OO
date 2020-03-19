<?php
    require_once 'classConexao.php';
	include '../Modell/classAluno.php';
	
	class AlunoDAO{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	

        public function insertAluno($aluno){
            $nomeAluno = $aluno->getNomeAluno();
            $turno = $aluno->getTurno();
            $serie = $aluno->getSerie();

            $sql = "INSERT INTO alunos (nomeAluno, turno, serie)VALUES('$nomeAluno', '$turno', '$serie')";
            $this->conexao->query($sql);
        }
        public function listAlunos(){
            $consulta = $this->conexao->query("SELECT * FROM alunos");
			    $arrayAlunos = array();
			    while ($linha = mysqli_fetch_array($consulta)) {
            $aluno = new Aluno($linha['alunoId'], $linha['nomeAluno'], $linha['turno'], $linha['serie']);
				array_push($arrayAlunos, $aluno);
			}
			return $arrayAlunos;
        }
        public function searchAluno($alunoId){
            $linha = $this->conexao->buscarRegistro("SELECT * FROM alunos WHERE alunoId = '$alunoId'"); 
            $aluno = new Aluno($linha['alunoId'], $linha['nomeAluno'], $linha['turno'], $linha['serie']);
            return $aluno;
        }
        public function updateAluno($aluno){
            
          $alunoId = $aluno->getAlunoId();
          $nomeAluno = $aluno->getNomeAluno();
          $turno = $aluno->getTurno();
          $serie = $aluno->getSerie();

            $sql = "UPDATE alunos SET nomeAluno='$nomeAluno', turno='$turno', serie='$serie' WHERE alunoId='$alunoId'";
            $this->conexao->query($sql);
        }
        public function deleteAluno($alunoId){
            $sql = "DELETE FROM alunos WHERE alunoId = '$alunoId'";
            $this->conexao->query($sql);
        }
    }
?>