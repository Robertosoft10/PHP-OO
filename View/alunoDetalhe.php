<?php
session_start();
include_once '../Api/secury.php';
include_once '../Api/conexao.php';
require_once '../Api/classAlunoDao.php';
$alunoDAO = new AlunoDAO();
$alunos = $alunoDAO->listAlunos();
if(isset($_GET['alunoId'])){
  $alunoId = $_GET['alunoId'];
  $aluno = $alunoDAO->searchAluno($alunoId);
}
$alunoId = $_GET['alunoId'];
$sql = "SELECT * FROM notas NT JOIN alunos AL ON NT.aluno = AL.alunoId JOIN professores PF ON NT.professor = PF.profId JOIN disciplinas DC ON NT.disciplina = DC.disciId WHERE alunoId = '$alunoId'";
$consulta = mysqli_query($conexao, $sql);
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
        <nav  id="barra-pagina" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""  id="barra-pagina">Sistema Escolar 2.0</a>
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
                    <a class="dropdown-toggle" href="../Api/logout.php"  id="barra-pagina">
                        <i class="fa fa-user fa-fw"></i>  Logado: <?php echo $_SESSION['nomeUser'];?>  <i class="fa fa-sign-out fa-fw"></i> Sair</i>
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
                          <a href="painelAdm.php"><i class="fa fa-dashboard fa-fw"></i> Painel Admin</a>
                      </li>
                      <li>
                          <a href="alunos.php"><i class="fa fa-users fa-fw"></i> Alunos</a>
                      </li>
                      <li>
                          <a href="professor.php"><i class="fa fa-users fa-fw"></i> Professores</a>
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
                    <h3 class="page-header">Detalhes do Aluno
                    </h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="nome-aluno">
                           Aluno: <?php echo $aluno->getNomeAluno();?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    ID: <?php echo $aluno->getAlunoid();?>,
                                    Série: <?php echo $aluno->getSerie();?>,
                                    Turno: <?php echo $aluno->getTurno();?>
                                    <hr>
                                    <div class="form-group col-lg-12 col-xs-12">
                                    <a href="editarAluno.php?alunoId=<?= $aluno->getAlunoId();?>">
                                    <button   class="btn btn-warning"><i class="fa fa-pencil"></i> Editar </button></a>
                                    <a href="../Controller/excluirAluno.php?alunoId=<?= $aluno->getAlunoId();?>">
                                    <button   class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button></a>
                                  </div>

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
                <!-- /.col-lg-4 -->
            </div>
            </div>
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"  id="barra-pagina">
                           Lista de Notas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Professor</th>
                                        <th>Disciplina</th>
                                        <th>1º Bm </th>
                                        <th>2º Bm </th>
                                        <th>3º Bm </th>
                                        <th>4º Bm </th>
                                        <th>PT</th>
                                        <th>M. Final</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php while($nota = mysqli_fetch_array($consulta)){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $nota['nomeProf'];?> </td>
                                        <td><?php echo $nota['disciplina'];?></td>
                                        <td><?php echo $nota['nota1'];?></td>
                                        <td><?php echo $nota['nota2'];?></td>
                                        <td><?php echo $nota['nota3'];?></td>
                                        <td><?php echo $nota['nota4'];?></td>
                                        <?php $mdeiaS = $nota['nota1'] + $nota['nota2'] + $nota['nota3'] + $nota['nota4'];?>
                                        <td><?php echo $mdeiaS;?></td>
                                        <?php $medeiaF = ($nota['nota1'] + $nota['nota2'] + $nota['nota3'] + $nota['nota4']) / 4;?>
                                        <td><?php echo $medeiaF;?></td>
                                          <td>
                                            <a href="../Controller/excluirNota.php?notaId=<?= $nota['notaId'];?>">
                                            <button class="btn btn-danger btn-sm"><i  class="fa  fa-trash"></i> </button></a>
                                          </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
     <script>
    $(document).ready(function() {
        $('#dataTables-example2').DataTable({
            responsive: true
        });
    });
    </script>
     <script>
    $(document).ready(function() {
        $('#dataTables-example3').DataTable({
            responsive: true
        });
    });
    </script>
     <script>
    $(document).ready(function() {
        $('#dataTables-example4').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
