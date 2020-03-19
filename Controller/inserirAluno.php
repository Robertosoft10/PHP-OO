<?php
session_start();
include_once '../Api/classAlunoDao.php';

if(!empty($_POST['nomeAluno']) && !empty($_POST['turno']) && !empty($_POST['serie'])){
    
    $objtAluno = new Aluno();
    $objtAluno->setNomeAluno($_POST['nomeAluno']);
    $objtAluno->setTurno($_POST['turno']);
    $objtAluno->setSerie($_POST['serie']);

    $dao = new AlunoDAO();
    $dao->insertAluno($objtAluno);

$_SESSION['alunoSalvo'] = "Cadastro efetuado com sucesso!";
    header('location: ../View/alunos.php');

}else{
   $_SESSION ['alunoNaoSalvo'] = "Falha no cadastro!  Campos obrigatórios *";
   header('location: ../View/alunos.php');
}

?>