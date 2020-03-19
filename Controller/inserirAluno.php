<?php
session_start();
include_once '../Api/classAlunoDao.php';

if(!empty($_POST['nomeAluno']) && !empty($_POST['turno']) && !empty($_POST['serie'])){
    
$objtAuno = new Aluno();

$objtAuno->setNomeAluno($_POST['nomeAluno']);
$objtAuno->setTurno($_POST['turno']);
$objtAuno->setSerie($_POST['serie']);

$dao = new AlunoDAO();
$dao->insertAluno($objtAuno);

$_SESSION['alunoSalvo'] = "Cadastro efetuado con sucesso!";
    header('location: ../View/alunos.php');

}else{
   $_SESSION ['alunoNaoSalvo'] = "Falha no cadastro!  Campos obrigatórios *";
   header('location: ../View/alunos.php');
}

?>