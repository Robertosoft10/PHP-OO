<?php
session_start();
include_once '../Api/classProfessorDao.php';

if(isset($_GET['profId'])){
$professorDAO = new ProfessorDAO();
$professorDAO->deleteProfessor($_REQUEST['profId']);
    
    $_SESSION['profDeletado'] = "Registro deletado com sucesso";
    header('location: ../View/professor.php');
}else{
    $_SESSION['profNaoDeletado'] = "Falha! Registro não deletado";
    header('location: ../View/professor.php');
}
?>