<?php
session_start();
include_once '../Api/secury.php';
include_once '../Api/conexao.php';


$aluno = $_GET['alunoId'];
$professor = $_POST['professor'];
$disciplina = $_POST['disciplina'];
$bimestre = $_POST['bimestre'];
$nota = $_POST['nota'];

  $sql = "INSERT INTO notas (aluno, professor, disciplina, bimestre, nota)VALUES('$aluno', '$professor', '$disciplina', '$bimestre', '$nota')";
  $executar = mysqli_query($conexao, $sql);
if($executar == true){
$_SESSION['notaSalva'] = "Cadastro efetuado com sucesso!";
}else{

}
include_once '../Api/conexao.php';
require_once '../Api/classAlunoDao.php';
$alunoDAO = new AlunoDAO();
$alunos = $alunoDAO->listAlunos();
if(isset($_GET['alunoId'])){
  $alunoId = $_GET['alunoId'];
  $aluno = $alunoDAO->searchAluno($alunoId);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema Escolar</title>

    <!-- Bootstrap Core CSS -->
    <link href="../Components/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../Components/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../Components/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../Components/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../Components/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Css extorno -->
    <link href="../Components/style.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Sistema Escolar 2.0</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <ul class="dropdown-menu dropdown-messages"></ul>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <ul class="dropdown-menu dropdown-tasks"></ul>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <ul class="dropdown-menu dropdown-alerts"></ul>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" href="../Api/logout.php">
                        <i class="fa fa-user fa-fw"></i> Logado: <?php echo $_SESSION['nomeUser'];?>  <i class="fa fa-sign-out fa-fw"></i> Sair:</i>
                    </a>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="../View/painelAdm.php"><i class="fa fa-dashboard fa-fw"></i> Painel Admin</a>
                        </li>
                        <li>
                            <a href="../View/alunos.php"><i class="fa fa-user fa-fw"></i> Alunos</a>
                        </li>
                        <li>
                            <a href="../View/professor.php"><i class="fa fa-user fa-fw"></i> Professores</a>
                        </li>
                        <li>
                            <a href="../Controller/backupDb.php"><i class="fa fa-database fa-fw"></i> Fazer Backup</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Detalhe do Aluno</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading" id="nome-aluno">
                           Aluno: <?php echo $aluno->getNomeAluno();?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" id="aluno-detalhe">
                                    ID: <?php echo $aluno->getAlunoid();?>,
                                    Série: <?php echo $aluno->getSerie();?>,
                                    Turno: <?php echo $aluno->getTurno();?>
                                    <a href="../View/alunoDetalhe.php?alunoId=<?= $aluno->getAlunoId();?>"
                                    <button type="button" class="btn btn-primary">
                                    Detalhe</button></a>
                                    <div>
                                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
                <!-- /.col-lg-4 -->
            </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exibir-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" id="modal-tamanho">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body text-center">
                          <h4><?php echo $_SESSION['notaSalva'];?></h4>
                          <a href="../View/alunoDetalhe.php?alunoId=<?= $aluno->getAlunoId();?>"
                          <button id="btn-modal-nota" type="button" class="btn btn-primary">
                          Ok</button></a>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../Components/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../Components/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../Components/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../Components/vendor/raphael/raphael.min.js"></script>
    <script src="../Components/vendor/morrisjs/morris.min.js"></script>
    <script src="../Components/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../Components/dist/js/sb-admin-2.js"></script>
    <script src="../Components/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../Components/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../Components/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
      $(document).ready(function() {
        $('#dataTables-example').DataTable({
          responsive: true
              });
          });
           </script>
           <?php
           if($_SESSION['notaSalva'] == true){
             ?>
           <script type="text/javascript">
           $(document).ready(function(){
             $('#exibir-modal').modal('show');
           });
           </script>
           <?php
       }else{

       }
    ?>
</body>

</html>
