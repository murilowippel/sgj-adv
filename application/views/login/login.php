<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?= base_url('img') ?>/favicon.png" type="image/png">

    <title>SGJ - Sistema de Gestão Jurídica</title>

    <!-- Bootstrap core CSS-->
    <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("css/sb-admin.css") ?>" rel="stylesheet">

  </head>

  <body style="background-image: url('<?= base_url("img/") ?>login-wallpaper.jpg');">

    <div class="container">
      <p class="logo-login">SGJ - Sistema de Gestão Jurídica</p>
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <?php if ($this->session->flashdata("danger")) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
          <?php endif ?>
          <?php if (isset($mensagem)) { ?>
            <p class="alert alert-warning" role="alert"><?= $mensagem ?></p>
          <?php } ?>
          <form action="<?= base_url("index.php/login/autenticar") ?>" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">E-mail</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Senha</label>
              </div>
            </div>
            <br>
            <!--<div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>-->
            <input class="btn btn-primary btn-block" type="submit" value="Entrar">
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?= base_url("index.php/login/cadastro") ?>">Criar nova conta</a>
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
