<?php
session_start();
include_once '../Api/secury.php';
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
        <navid="barra-pagina" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="" id="barra-pagina">Sistema Escolar 2.0</a>
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
                    <a class="dropdown-toggle" href="../Api/logout.php" id="barra-pagina">
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
                            <a href="alunos.php"><i class="fa fa-user fa-fw"></i> Alunos</a>
                        </li>
                        <li>
                            <a href="professor.php"><i class="fa fa-user fa-fw"></i> Professores</a>
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
                    <h3 class="page-header">Aluno</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="barra-pagina">
                            Editar dados do Aluno
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <form role="form" action="../Controller/atualizarAluno.php?alunoId=<?= $aluno->getAlunoId();?>" method="post">
                                        <div class="form-group col-lg-12 col-xs-12">
                                        <label>Aluno:</label>
                                            <input class="form-control" name="nomeAluno"
                                            value="<?php echo $aluno->getNomeAluno();?>">
                                        </div>
                                        <div class="form-group col-lg-6 col-xs-6">
                                        <label>Turno: </label>
                                            <select class="form-control"  name="turno">
                                            <option><?php echo $aluno->getTurno();?></option>
                                                <option>Manhã</option>
                                                <option>Tarde</option>
                                                <option>Noite</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6 col-xs-6">
                                        <label>Série: </label>
                                            <select class="form-control" name="serie">
                                                <option><?php echo $aluno->getSerie();?></option>
                                                <option><strong>Educação Infantil</strong></option>
                                                <option>Infantil</option>
                                                <option>Infantil G-1</option>
                                                <option>Infantil G-2</option>
                                                <option>Infantil G-3</option>
                                                <option>Infantil G-4</option>
                                                <option>Infantil G-5</option>
                                                <option><strong>Ensino Fundamental I</strong></option>
                                                <option>1º Ano</option>
                                                <option>2º Ano</option>
                                                <option>3º Ano</option>
                                                <option>4º Ano</option>
                                                <option>5º Ano</option>
                                                <option><strong>Ensino Fundamental II</strong></option>
                                                <option>6º Ano</option>
                                                <option>7º Ano</option>
                                                <option>8º Ano</option>
                                                <option>9º Ano</option>
                                                <option><strong>Ensino Médio</strong></option>
                                                <option>1º Ano Ensino Médio</option>
                                                <option>2º Ano Ensino Médio</option>
                                                <option>3º Ano Ensino Médio</option>
                                                <option>1º Ano Ensino Médio - Formação Téc</option>
                                                <option>2º Ano Ensino Médio - Formação Téc</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-xs-12">
                                        <button id="barra-pagina" type="submit" class="btn btn-default">Salvar Alterações</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="barra-pagina">
                           Lista de Alunos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="col-xs-2">ID</th>
                                        <th class="col-xs-5">Aluno</th>
                                        <th class="col-xs-3"> Série</th>
                                        <th class="col-xs-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($aluno = array_shift($alunos)){?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $aluno->getAlunoId();?></td>
                                        <td><?php echo $aluno->getNomeAluno();?></td>
                                        <td><?php echo $aluno->getSerie();?></td>
                                        <td>
                                        <a href="alunoDetalhe.php?alunoId=<?= $aluno->getAlunoId();?>">
                                        <button id="barra-pagina" class="btn btn-default btn-xs"><i id="btn-detalhe" class="fa  fa-eye"></i> </button></a>
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

</body>

</html>
