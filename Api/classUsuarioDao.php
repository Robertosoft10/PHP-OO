<?php
    require_once 'classConexao.php';
	include '../Modell/classUsuario.php';
	
	class UsuarioDAO{
		
		private $conexao;
		
		public function __construct(){
			$this->conexao = new Conexao();
				 if($this->conexao->conectar() == false){
				 	 echo "Não conectou!" . mysql_error();	
				 }
		}	

        public function insertUsuario($usuario){
            $nomeUser = $usuario->getNomeUser();
            $email = $usuario->getEmail();
            $password = $usuario->getPassword();
            $tipo = $usuario->getTipo();
            $status = $usuario->getStatus();

            $sql = "INSERT INTO usuarios (nomeUser, email, password, tipo, status)VALUES('$nomeUser', '$email', '$password', '$tipo', '$status')";
            $this->conexao->query($sql);
        }
        
        public function listUsuarios(){
            $consulta = $this->conexao->query("SELECT * FROM usuarios");
			    $arrayUsuarios = array();
			    while ($linha = mysqli_fetch_array($consulta)) {
                $usuario = new Usuario($linha['userId'], $linha['nomeUser'], $linha['email'], $linha['password'], $linha['tipo'], $linha['status']);
				array_push($arrayUsuarios, $usuario);
			}
			return $arrayUsuarios;
        }
        
        public function searchUsuario($userId){
            $linha = $this->conexao->buscarRegistro("SELECT * FROM usuarios WHERE userId = '$userId'"); 
            $usuario = new Usuario($linha['userId'], $linha['nomeUser'], $linha['email'], $linha['password'], $linha['tipo'], $linha['status']);
            return $usuario;
        }
        public function updateUsusario($usuario){
            $userId = $usuario->getUserId();
            $nomeUser = $usuario->getNomeUser();
            $email = $usuario->getEmail();
            $password = $usuario->getPassword();
            $tipo = $usuario->getTipo();
            $status = $usuario->getStatus();

            $sql = "UPDATE usuarios SET nomeUser='$nomeUser', email='$email', password='$password', tipo='$tipo' , status='$status' WHERE userId='$userId'";
            $this->conexao->query($sql);
        }
        public function deleteUsuario($userId){
            $sql = "DELETE FROM usuarios WHERE userId = '$userId'";
            $this->conexao->query($sql);
        }
    }
?>