<?php
session_start();
require_once '../Api/classAlunoDao.php';
$alunoDAO = new AlunoDAO();
$alunos = $alunoDAO->listAlunos();
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
                        <i class="fa fa-user fa-fw"></i> Logado:</i> <i class="fa fa-sign-out fa-fw"></i> Sair:</i>
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
                            <a href="notas.php"><i class="fa fa-file-text-o fa-fw"></i> Notas</a>
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
                    <h3 class="page-header">Professores</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
                <!-- alerts cadastro -->
                <?php if(isset($_SESSION ['profNaoSalvo'])){?>
                <div class="alert alert-danger" role="alert">
                <i class="fa fa-warning"></i>  <?php echo $_SESSION ['profNaoSalvo'];?>
                </div>
                <?php unset($_SESSION ['profNaoSalvo']); } ?>

                <?php if(isset($_SESSION ['alunoSaprofNaoSalvolvo'])){?>
                <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>  <?php echo $_SESSION ['alunoSalvo'];?>
                </div>
                <?php unset($_SESSION ['alunoSalvo']); } ?>

                <!-- alert update -->
                <?php if(isset($_SESSION ['profSalvo'])){?>
                <div class="alert alert-danger" role="alert">
                <i class="fa fa-check"></i>  <?php echo $_SESSION ['profSalvo'];?>
                </div>
                <?php unset($_SESSION ['profSalvo']); } ?>

                <?php if(isset($_SESSION ['alunoAtualizado'])){?>
                <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>  <?php echo $_SESSION ['alunoAtualizado'];?>
                </div>
                <?php unset($_SESSION ['alunoAtualizado']); } ?>
                 <!-- alert delete -->
                 <?php if(isset($_SESSION ['alunoNaoDeletado'])){?>
                <div class="alert alert-danger" role="alert">
                <i class="fa fa-check"></i>  <?php echo $_SESSION ['alunoNaoDeletado'];?>
                </div>
                <?php unset($_SESSION ['alunoNaoDeletado']); } ?>

                <?php if(isset($_SESSION ['alunoDeletado'])){?>
                <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>  <?php echo $_SESSION ['alunoDeletado'];?>
                </div>
                <?php unset($_SESSION ['alunoDeletado']); } ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading"> 
                            Cadastrar novo Professor
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <form role="form" action="../Controller/inserirProfessor.php" method="post">
                                        <div class="form-group col-lg-12 col-xs-12">
                                        <label>Professor: *</label>
                                            <input class="form-control" name="nomeProf">
                                        </div>
                                        <div class="form-group col-lg-6 col-xs-6">
                                        <label>Disciplina: *</label>
                                            <select class="form-control"  name="disciplinaCod">
                                            <option></option>
                                                <option>fddfdsfd</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-12 col-xs-12">
                                        <button type="submit" class="btn btn-success">Salvar Cadastro</button>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Lista de Professores 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th class="col-xs-2">ID</th>
                                        <th class="col-xs-5">Professor</th>
                                        <th class="col-xs-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($aluno = array_shift($alunos)){?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $aluno->getAlunoId();?></td>
                                        <td><?php echo $aluno->getSerie();?></td>
                                        <td>
                                        <a href="alunoDetalhe.php?alunoId=<?= $aluno->getAlunoId();?>"> 
                                        <button class="btn btn-primary btn-xs"><i id="btn-detalhe" class="fa  fa-eye"></i> </button></a>
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
