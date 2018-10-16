<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Usuários</h1>
    <hr>
    <!--Conteúdo da Página-->
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("usuarios/novo") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary">Novo Usuário</a>
    </div>
    <div class="clear"></div>
    <!--<hr>-->
    <?php if ($this->session->flashdata("success")) : ?>
      <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
    <?php endif ?>

    <?php if ($this->session->flashdata("danger")) : ?>
      <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
    <?php endif ?>
    <!--Tabela-->
    <div class="card mb-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>Tipo de usuário</th>
                <th>Liberado</th>
                <th></th>
              </tr>
            </thead>
            <?php foreach ($usuarios as $usuario) : ?>
              <tbody>
                <tr>
                  <td><?= $usuario['idusuario'] ?></td>
                  <td><?= $usuario['nome'] ?></td>
                  <td><?= $usuario['email'] ?></td>
                  <td><?= $usuario['cpf'] ?></td>
                  <td><?php 
                        if($usuario['nvlacesso'] == "A") { 
                          echo "Advogado(a)";
                        } elseif($usuario['nvlacesso'] == "X") {
                          echo "Auxiliar";
                        } elseif($usuario['nvlacesso'] == "C") {
                          echo "Cliente";
                        } ?></td>
                  <td><?php 
                        if($usuario['liberado'] == '1') {
                          echo "Sim";
                        } else {
                          echo "Não";
                        } ?></td>
                  <td style="text-align: center;"><a href="<?= base_url("/usuarios/") ?><?= $usuario['idusuario'] ?>" class="btn btn-primary">Editar</a></td>
                </tr>
              </tbody>
            <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>
  </div>