<?php
session_start();
include_once '../Api/classAlunoDao.php';

if(!empty($_POST['NomeAluno']) && !empty($_POST['turno']) && !empty($_POST['serie'])){
    
$objtAuno = new Aluno();

$objtAuno->setNomeAlunoe($_REQUESTE['NomeAluno']);
$objtAuno->setTurno($_REQUESTE['turno']);
$objtAuno->setSerie($_REQUESTE['serie']);

$dao = new AlunoDAO();
$dao->insertAluno($objtAuno);

$_SESSION['alunoSalvo'] = "Cadastro efetuado con sucesso!";
    header('location: ../View/alunos.php');

}else{
   $_SESSION ['alunoNaoSalvo'] = "Falha no cadastro!<br> Campos obrigatórios *";
   header('location: ../View/alunos.php');
}
?>