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
    }
?>
