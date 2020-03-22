<?php
session_start();
include_once '../Api/conexao.php';
$notaId = $_GET[ 'notaId'];
$sql = "DELETE FROM notas WHERE notaId = '$notaId'";
$executar = mysqli_query($conexao, $sql);
if($executar == true){
  $_SESSION['notaDeletada'] = "Nota excluida com sucesso!";
      header('location: ../View/alunos.php');

  }else{
     $_SESSION ['notaNaoDeletada'] = "Falha nota não excluida";
     header('location: ../View/alunos.php');
  }
?>
