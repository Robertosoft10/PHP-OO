<?php
session_start();
include_once '../Api/classDisciplinaDao.php';

$objtDisci = new Disciplina();
$objtDisci->setDisciId($_GET['disciId']);
$objtDisci->setDisciplina($_POST['disciplina']);

$dao = new DisciplinaDAO();
$dao->updateDisciplina($objtDisci);

if($dao == true){
$_SESSION['disciAtualizado'] = "Dados atualizados sucesso!";
    header('location: ../View/disciplina.php');

}else{
   $_SESSION ['disciNaoAtualizado'] = "Falha na atualização dos dados";
   header('location: ../View/disciplina.php');
}
?>