<?php
session_start();
include_once '../Api/classAlunoDao.php';

$objtAluno = new Aluno();
$objtAluno->setAlunoId($_GET['alunoId']);
$objtAluno->setNomeAluno($_POST['nomeAluno']);
$objtAluno->setTurno($_POST['turno']);
$objtAluno->setSerie($_POST['serie']);
$dao = new AlunoDAO();
$dao->updateAluno($objtAluno);

if($dao == true){
$_SESSION['alunoAtualizado'] = "Dados atualizados sucesso!";
    header('location: ../View/alunos.php');

}else{
   $_SESSION ['alunoNaoAtualizado'] = "Falha na atualização dos dados";
   header('location: ../View/alunos.php');
}
?>