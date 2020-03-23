<?php session_start();?>
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
    <link href="Components/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="Components/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="Components/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="Components/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="Components/style.css" rel="stylesheet">
</head>
<?php
 unset($_SESSION['email'],
 $_SESSION['password']);
?>
<body>
  <div id="barra-login">
    <div class="logo">
    <i id="icon-login" class="fa fa-graduation-cap"></i><br>
    <small id="nome-sistem"> Sistema Escolar  </small><br>
        <small id="subtutulo-sistem"> Lançamento de Notas</small>
      </div>
  </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" id="form-login">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Acessar  Sistema</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="Api/login.php" method="post">
                            <fieldset>
                            <?php if(isset($_SESSION ['loginVazio'])){?>
                            <div class="alert alert-danger" role="alert">
                            <i class="fa fa-check"></i>  <?php echo $_SESSION ['loginVazio'];?>
                            </div>
                            <?php unset($_SESSION ['loginVazio']); } ?>

                            <?php if(isset($_SESSION ['loginIncorreto'])){?>
                            <div class="alert alert-danger" role="alert">
                            <i class="fa fa-check"></i>  <?php echo $_SESSION ['loginIncorreto'];?>
                            </div>
                            <?php unset($_SESSION ['loginIncorreto']); } ?>

                            <?php if(isset($_SESSION ['secury'])){?>
                            <div class="alert alert-danger" role="alert">
                            <i class="fa fa-check"></i>  <?php echo $_SESSION ['secury'];?>
                            </div>
                            <?php unset($_SESSION ['secury']); } ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="password" type="password">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="btn-login" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i> Entrar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="Components/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="Components/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="Components/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="Components/dist/js/sb-admin-2.js"></script>

</body>

</html>
