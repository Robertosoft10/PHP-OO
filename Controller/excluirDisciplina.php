<?php
session_start();
include_once '../Api/classDisciplinaDao.php';

if(isset($_GET['disciId'])){
$disciplinaDAO = new DisciplinaDAO();
$disciplinaDAO->deleteDisciplina($_REQUEST['disciId']);
    
    $_SESSION['disciDeletado'] = "Registro deletado com sucesso";
    header('location: ../View/disciplina.php');
}else{
    $_SESSION['discioNaoDeletado'] = "Falha! Registro não deletado";
    header('location: ../View/disciplina.php');
}
?>