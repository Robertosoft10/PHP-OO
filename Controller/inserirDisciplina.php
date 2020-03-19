<?php
session_start();
include_once '../Api/classDisciplinaDao.php';

if(!empty($_POST['disciplina'])){
    
    $objtDesci = new Disciplina();
    $objtDesci->setDisciplina($_POST['disciplina']);

    $dao = new DisciplinaDAO();
    $dao->insertDisciplina($objtDesci);

$_SESSION['disciSalvo'] = "Cadastro efetuado com sucesso!";
    header('location: ../View/disciplina.php');

}else{
   $_SESSION ['disciNaoSalvo'] = "Falha no cadastro!  Campo obrigatório *";
   header('location: ../View/disciplina.php');
}

?>