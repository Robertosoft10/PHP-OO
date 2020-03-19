<?php
session_start();
include_once '../Api/classProfessorDao.php';

if(!empty($_POST['nomeProf'])){
    
    $objtProfessor = new Professor();
    $objtProfessor->setPomeProf($_POST['nomeProf']);
    $objtProfessor->setDisciplinaCod($_POST['disciplinaCod']);

    $dao = new ProfessorDAO();
    $dao->insertProfessor($objtProfessor);

$_SESSION['profSalvo'] = "Cadastro efetuado com sucesso!";
    header('location: ../View/professor.php');

}else{
   $_SESSION ['profNaoSalvo'] = "Falha no cadastro!  Campos obrigatórios *";
   header('location: ../View/professor.php');
}

?>