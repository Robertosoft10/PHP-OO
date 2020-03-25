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
                        <h3 class="panel-title">Cadastrar Usuário</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="Controller/salvarUser.php" method="post">
                            <fieldset>
                                <div class="form-group">
                                  Nome:
                                    <input class="form-control"  name="nomeUser" type="text" required="">
                                </div>
                                <div class="form-group">
                                  E-mail:
                                    <input class="form-control"  name="email" type="email" required="">
                                </div>
                                <div class="form-group">
                                  Senha:
                                    <input class="form-control" name="password" type="password" required="">
                                </div>
                                <div class="form-group">
                                  Tipo:
                                    <select class="form-control"  name="tipo" type="text" required="">
                                    <option></option>
                                        <option  value="Admin">Usuário Admim</option>
                                        <option  value="User">Usuário Comum</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  Status:
                                    <select class="form-control" name="status" type="text" required="">
                                      <option></option>
                                          <option value="1">Ativo</option>
                                          <option value="0">Inativo</option>
                                      </select>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button id="btn-login" class="btn btn-default btn-block"><i class="fa fa-sign-in"></i> Salvar</button>
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
