<?php
    include_once 'classConexao.php';
	include_once '../Modell/classAluno.php';
	
	class AlunoDAO{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
        }	
        public function insertAluno($aluno){
            $NomeAluno = $aluno->getNomeAluno();
            $turno = $aluno->getTurno();
            $serie = $aluno->getSerie();

        $sql = "INSERT INTO alunos (NomeAlun, turno, serie)VALUES('$NomeAluno', '$turno', '$serie')";
        $this->conexao->query($sql);
        }
    }
        ?>