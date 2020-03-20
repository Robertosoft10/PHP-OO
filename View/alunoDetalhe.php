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
                        <i class="fa fa-user fa-fw"></i> Logado:  Logado: <?php echo $_SESSION['nomeUser'];?>  <i class="fa fa-sign-out fa-fw"></i> Sair:</i>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Detalhe do Aluno: <?php echo $aluno->getNomeAluno();?>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" id="aluno-detalhe">
                                    ID: <?php echo $aluno->getAlunoid();?>,
                                    Série: <?php echo $aluno->getSerie();?>, 
                                    Turno: <?php echo $aluno->getTurno();?>
                                    <hr>
                                    <div class="form-group col-lg-12 col-xs-12">
                                    <a href="editarAluno.php?alunoId=<?= $aluno->getAlunoId();?>"> 
                                    <button  class="btn btn-warning"><i class="fa fa-pencil"></i> Editar </button></a>
                                    <a href="../Controller/excluirAluno.php?alunoId=<?= $aluno->getAlunoId();?>"> 
                                    <button  class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button></a>
                                    <div>
                                </div>
                                <hr>
                                <?php
                                /* cadastrar nota */
                                @$aluno = $_GET['alunoId'];
                                @$professor = $_POST['professor'];
                                @$disciplina = $_POST['disciplina'];
                                @$bimestre = $_POST['bimestre'];
                                @$nota = $_POST['nota'];
                                $sql = "INSERT INTO notas(aluno, professor, disciplina, bimestre, nota)VALUES('$aluno', '$professor', '$disciplina', '$bimestre', '$nota')";
                                $execute = mysqli_query($conexao, $sql);
                                if($execute == true){
                                    $_SESSION['disciOK'] = "Disciplina adicionada com sucesso";
                                }
                                ?>
                                <form role="form" action="?" method="post">
                                        <div class="form-group col-lg-4 col-xs-4">
                                        <small  id="form-nota">Preofessor: *</small>
                                        <select class="form-control"  name="professor">
                                            <option></option>
                                                <option value="2">ssssdd</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-xs-4">
                                        <small  id="form-nota">Disciplina: *</small>
                                            <select class="form-control"  name="disciplina">
                                            <option></option>
                                                <option value="1">eew</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-xs-4">
                                        <small  id="form-nota">Bimestre: *</small>
                                        <select class="form-control" name="bimestre">
                                                <option></option>
                                                <option value="b1">1º Bimestre</option>
                                                <option value="b2">2º Bimestre</option>
                                                <option value="b3">2º Bimestre</option>
                                                <option value="b4">2º Bimestre</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-4 col-xs-4">
                                        <small  id="form-nota">Nota: *</small>
                                        <input class="form-control"  name="nota">
                                        </div>
                                        <div class="form-group col-lg-4 col-xs-4">
                                            <br>
                                        <button type="submit" class="btn btn-success">Salvar Nota</button>
                                        </div>  
                                    </form>
                                
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Notas do Aluno
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#bimetre1-pills" data-toggle="tab">1º Bimestre</a>
                                </li>
                                <li><a href="#bimetre2-pills" data-toggle="tab">2º Bimestre</a>
                                </li>
                                <li><a href="#bimetre3-pills" data-toggle="tab">3º Bimestre</a>
                                </li>
                                <li><a href="#bimetre4-pills" data-toggle="tab">4º Bimestre</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="bimetre1-pills">
                                    <h4>1º Bimestre</h4>
                                <!-- b 1-->
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Professor (a)</th>
                                        <th>Disciplina</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>b 01</td>
                                        <td>b 01</td>
                                        <td>b 01</td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>
                                <!-- fim b 1-->
                                <div class="tab-pane fade" id="bimetre2-pills">
                                <h4>2º Bimestre</h4>
                              <!-- b 2-->
                              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                <thead>
                                    <tr>
                                        <th>Professor (a)</th>
                                        <th>Disciplina</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>b 01</td>
                                        <td>b 01</td>
                                        <td>b 01</td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>
                                <!-- fim b 2-->
                                <div class="tab-pane fade" id="bimetre3-pills">
                                <h4>3º Bimestre</h4>
                                   <!-- inicio b 3-->
                                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                <thead>
                                    <tr>
                                        <th>Professor (a)</th>
                                        <th>Disciplina</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>b 01</td>
                                        <td>b 01</td>
                                        <td>b 01</td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>
                                <!-- fim b 3-->
                                <div class="tab-pane fade" id="bimetre4-pills">
                                <h4>4º Bimestre</h4>
                                    <!-- inicio b 4-->
                                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example4">
                                <thead>
                                    <tr>
                                        <th>Professor (a)</th>
                                        <th>Disciplina</th>
                                        <th>Nota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>b 01</td>
                                        <td>b 01</td>
                                        <td>b 01</td>
                                    </tr>
                                </tbody>
                            </table>
                                </div>
                                <!-- fim b 4-->
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
