<?php
session_start();
include_once '../Api/conexao.php';
$prof_dc_Id = $_GET['prof_dc_Id'];
$sql = "DELETE FROM prof_disciplina WHERE prof_dc_Id = '$prof_dc_Id'";
$execute = mysqli_query($conexao, $sql);
if($execute == treu){
$_SESSION['discRemovido'] = "Registro excluido com sucesso!";
    header('location: ../View/professor.php');
}else{
   $_SESSION ['discNaoRemovido'] = "Falha no cadastro registro não excluido";
   header('location: ../View/professor.php');
}