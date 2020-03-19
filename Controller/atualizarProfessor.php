<?php
session_start();
include_once '../Api/classProfessorDao.php';
    if(isset($_GET['profId'])){
    $objtProfessor = new Professor();
    $objtProfessor->setProfId($_GET['profId']);
    $objtProfessor->setNomeProf($_POST['nomeProf']);

    $dao = new ProfessorDAO();
    $dao->updateProfessor($objtProfessor);

$_SESSION['profAtualizado'] = "Registro atualizado com sucesso";
    header('location: ../View/professor.php');

}else{
   $_SESSION ['profNaoAtualizado'] = "Falha registro não atualizado";
   header('location: ../View/professor.php');
}
?>