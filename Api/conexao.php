<?php
ini_set('default charset', 'UTF-8');
$SERVER = "127.0.0.1";
$USER = "root";
$PASS = "";
$DBNAME = "lancanotas";
$conexao = mysqli_connect($SERVER, $USER, $PASS, $DBNAME);

if(mysqli_connect_error()){
    echo "Flalha na conexao, Insira a base de dados";
  }else{
      mysqli_query($conexao, "SET NAMES 'utf8'");
      mysqli_query($conexao, 'SET character_set_connection=utf8');
      mysqli_query($conexao, 'SET character_set_client=utf8');
      mysqli_query($conexao, 'SET character_set_results=utf8');
  }
?>