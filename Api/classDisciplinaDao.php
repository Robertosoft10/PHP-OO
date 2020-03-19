<?php
    require_once 'classConexao.php';
	include '../Modell/classDisciplina.php';
	
	class DisciplinaDAO{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	

        public function insertDisciplina($disciplina){
            $disciplina = $disciplina->getDisciplina();

            $sql = "INSERT INTO disciplinas (disciplina)VALUES('$disciplina')";
            $this->conexao->query($sql);
        }
        public function listDisciplina(){
            $consulta = $this->conexao->query("SELECT * FROM disciplinas");
			    $arrayDisciplinas = array();
			    while ($linha = mysqli_fetch_array($consulta)) {
            $disciplina = new Disciplina($linha['disciId'], $linha['disciplina']);
				array_push($arrayDisciplinas, $disciplina);
			}
			return $arrayDisciplinas;
        }
        public function searchDisciplina($disciId){
            $linha = $this->conexao->buscarRegistro("SELECT * FROM disciplinas WHERE disciId = '$disciId'"); 
            $disciplina = new Disciplina($linha['disciId'], $linha['disciplina']);
            return $disciplina;
        }
        public function updateDisciplina($disciplina){
            
          $disciId = $disciplina->getDisciId();
          $disciplina = $disciplina->getDisciplina();

            $sql = "UPDATE disciplinas SET disciplina='$disciplina' WHERE disciId='$disciId'";
            $this->conexao->query($sql);
        }
        public function deleteDisciplina($disciId){
            $sql = "DELETE FROM disciplinas WHERE disciId = '$disciId'";
            $this->conexao->query($sql);
        }
    }
?>