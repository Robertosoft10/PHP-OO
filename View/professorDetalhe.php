<?php
session_start();
include_once '../Api/conexao.php';
require_once '../Api/classProfessorDao.php';
$professorDAO = new ProfessorDAO();
$professorList = $professorDAO->listProfessores();
if(isset($_GET['profId'])){
    $profId = $_GET['profId'];
    $professor = $professorDAO->searchProfessor($profId);
  }
@$profCodigo = $_GET['profId'];
@$disciCodigo = $_POST['disciCodigo'];
$sql = "INSERT INTO prof_disciplina(profCodigo, disciCodigo)VALUES('$profCodigo', '$disciCodigo')";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['disciOK'] = "Disciplina adicionada com sucesso";
}
$sql = "SELECT * FROM prof_disciplina";
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
                    <h3 class="page-header">Professor</h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                           Detalhe do Professor
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12" id="aluno-detalhe">
                                    ID: <?php echo $professor->getProfId();?><br>
                                    Professor (a): <?php echo $professor->getNomeProf();?><br>
                                    <hr>
                                    <div class="form-group col-lg-12 col-xs-12">
                                    <a href="editarProfessor.php?profId=<?= $professor->getProfId();?>"> 
                                    <button  class="btn btn-warning"><i class="fa fa-pencil"></i> Editar </button></a>
                                    <a href="../Controller/excluirProfessor.php?profId=<?= $professor->getProfId();?>"> 
                                    <button  class="btn btn-danger"><i class="fa fa-trash"></i> Excluir</button></a>
                                    <div>
                                    <hr>
                                    <!-- alert cadastro -->
                                    <?php if(isset($_SESSION ['disciOK'])){?>
                                    <div class="alert alert-success" role="alert">
                                    <i class="fa fa-check"></i>  <?php echo $_SESSION ['disciOK'];?>
                                    </div>
                                    <?php unset($_SESSION ['disciOK']); } ?>
                                    <?php
                                    /* listar disciplina cadastrada*/
                                    require_once '../Api/classDisciplinaDao.php';
                                    $disciplinaDAO = new DisciplinaDAO();
                                    $disciplinalist = $disciplinaDAO->listDisciplina();
                                    ?>
                                    <form aciton="?profId=<?= $professor->getProfId();?>" method="post">
                                    <small>Inserir Disciplinas Lecionadas</small>
                                    <div class="input-group custom-search-form">
                                        <select type="text" class="form-control" name="disciCodigo">
                                            <option></option>
                                            <?php while($objtDisci = array_shift($disciplinalist)){?>
                                          <option value="<?php echo $objtDisci->getDisciId();?>">
                                          <?php echo $objtDisci->getDisciplina();?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        <span class="input-group-btn">
                                        <button class="btn btn-success"> Salvar Disciplina</button>
                                    </span>
                                    </div>
                                    </form>
                                </div>
                                <br>
                            Lista de Disciplinas Lecionadas:<br>
                            <table width="100%" class="table table-striped table-bordered table-hover">
                            <?php while($linhaDisc = mysqli_fetch_array($consulta)){?>
                                    <tr class="odd gradeX">
                                        <td class="col-xs-11"><?php echo $linhaDisc['disciCodigo'];?></td>
                                        <td class="col-xs-1">
                                        <a href="../Controller/excluirDiscProf.php?prof_dc_Id=<?= $linhaDisc['prof_dc_Id'];?>"> 
                                        <button class="btn btn-danger btn-sm"><i  class="fa  fa-trash"></i> </button></a>
                                    </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
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

</body>

</html>
