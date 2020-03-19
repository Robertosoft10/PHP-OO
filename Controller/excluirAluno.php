<?php
session_start();
include_once '../Api/classAlunoDao.php';

if(isset($_GET['alunoId'])){
$alunoDAO = new AlunoDAO();
$alunoDAO->deleteAluno($_REQUEST['alunoId']);
    
    $_SESSION['alunoDeletado'] = "Registro deletado com sucesso";
    header('location: ../View/alunos.php');
}else{
    $_SESSION['alunoNaoDeletado'] = "Falha! Registro não deletado";
    header('location: ../View/alunos.php');
}
?>