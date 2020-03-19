<?php
session_start();
include_once '../Api/repositorioAluno.php';

if(!empty($_REQUEST['nomeAluno']) && !empty($_REQUEST['turno']) && !empty($_REQUEST['serie'])){
    
$objtAuno = new Aluno(null, $_REQUEST['nomeAluno'], $_REQUEST['turno'], $_REQUEST['serie']);

$repositorio->insertAluno($objtAuno);

$_SESSION['alunoSalvo'] = "Cadastro efetuado com sucesso!";
    header('location: ../View/alunos.php');

}else{
   $_SESSION ['alunoNaoSalvo'] = "Falha no cadastro!  Campos obrigatórios *";
   header('location: ../View/alunos.php');
}

?>