<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGJ - Sistema de Gestão Jurídica - Cadastro</title>

    <!-- Bootstrap core CSS-->
    <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("css/sb-admin.css") ?>" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Criar nova conta</div>
        <div class="card-body">
          <form action="<?= base_url("index.php/login/inserirnovo") ?>" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <div class="form-label-group">
                    <input name="nome" type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">Nome Completo</label>                    
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">E-mail</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Senha</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input name="senha" type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirmar Senha</label>
                  </div>
                </div>
              </div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" value="Inscrever-se">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?= base_url("index.php/login") ?>">Acessar o sistema</a>
            <a class="d-block small" href="<?= base_url("index.php/login/recuperar") ?>">Esqueceu sua senha?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url("js/jquery.min.js") ?>"></script>
    <script src="<?= base_url("js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url("js/jquery.easing.min.js") ?>"></script>

  </body>

</html>
