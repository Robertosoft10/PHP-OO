<?php
session_start();
include_once '../Api/classMediaDao.php';
if(isset($_GET['mediaId'])){
$objtMedia = new Media();
$objtMedia->setMediaId($_GET['mediaId']);
$objtMedia->setMediaAp($_POST['mediaAp']);
$objtMedia->setMinimoRec($_POST['minimoRec']);
$dao = new MediaDAO();
$dao->updateMedia($objtMedia);

$_SESSION['mediaAtualizado'] = "Dados atualizados sucesso!";
    header('location: ../View/disciplina.php');

}else{
   $_SESSION ['mediaNaoAtualizado'] = "Falha na atualização dos dados";
   header('location: ../View/disciplina.php');
}
?>
