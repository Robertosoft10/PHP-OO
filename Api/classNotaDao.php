<?php
    require_once 'classConexao.php';
	include '../Modell/classNota.php';

	class NotaDAO{

		private $conexao;

		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();
				 }
		}

        public function insertNota($nota){
            $aluno = $nota->getAluno();
            $professor = $nota->getProfessor();
            $disciplina = $nota->getDisciplina();
            $bimestre = $nota->getBimestre();
            $nota = $nota->getNota();

            $sql = "INSERT INTO notas (aluno, professor, disciplina, bimestre, nota)VALUES('$aluno', '$professor', '$disciplina', '$bimestre', '$nota')";
            $this->conexao->query($sql);
        }
        /*
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
        */
    }
?>
