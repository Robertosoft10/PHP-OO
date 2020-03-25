<?php
session_start();
include_once '../Api/classMediaDao.php';

if(isset($_GET['mediaId'])){
$mediaDAO = new MediaDAO();
$mediaDAO->deleteMedia($_REQUEST['mediaId']);

    $_SESSION['mediaDeletado'] = "Registro deletado com sucesso";
    header('location: ../View/disciplina.php');
}else{
    $_SESSION['mediaNaoDeletado'] = "Falha! Registro não deletado";
    header('location: ../View/disciplina.php');
}
?>
