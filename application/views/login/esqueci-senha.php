<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SGJ - Recuperar Senha</title>

    <!-- Bootstrap core CSS-->
    <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("css/sb-admin.css") ?>" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Recuperar Senha</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Esqueceu sua senha?</h4>
            <p>Digite seu endereço de e-mail e nós lhe enviaremos instruções sobre como redefinir sua senha.</p>
          </div>
          <form>
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
                <label for="inputEmail">E-mail</label>
              </div>
            </div>
            <a class="btn btn-primary btn-block" href="login.html">Recuperar Senha</a>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?= base_url("index.php/login/cadastro") ?>">Criar nova conta</a>
            <a class="d-block small" href="<?= base_url("index.php/login") ?>">Acessar o sistema</a>
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
