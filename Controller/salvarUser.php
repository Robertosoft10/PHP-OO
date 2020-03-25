<?php
session_start();
include_once '../Api/conexao.php';
$email = $_POST['email'];

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$consulta = mysqli_query($conexao, $sql);
$result = mysqli_fetch_assoc($consulta);
if($result > 1){
    $_SESSION['userExiste'] = "Ops! Usuário com esse email já se encontra cadastrado";
    header('location: ../View/usuarios.php');
}else{
include_once '../Api/classUsuarioDao.php';

    $objtUser = new Usuario();
    $objtUser->setNomeUser($_POST['nomeUser']);
    $objtUser->setEmail($_POST['email']);
    $objtUser->setPassword(sha1($_POST['password']));
    $objtUser->setTipo($_POST['tipo']);
    $objtUser->setStatus($_POST['status']);

    $dao = new UsuarioDAO();
    $dao->insertUsuario($objtUser);

    $_SESSION['salvo'] = "Cadastro efetuado com sucesso!";
    header('location: /../sistema-escolar/index.php');
}
?>
