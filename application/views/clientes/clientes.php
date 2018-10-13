<!--CONTAINER DE CONTEÚDOS-->
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= base_url("index.php") ?>">Página Inicial</a>
      </li>
      <li class="breadcrumb-item active">Clientes</li>
    </ol>
    <!-- Page Content -->
    <h1>Clientes</h1>
    <hr>
    <a href="<?= base_url("index.php/clientes/novo") ?>" class="btn btn-primary">Novo</a>
    <div class="clear"></div>
    <hr>
    <!-- DataTables Example -->
    <div class="card mb-3">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Profissão</th>
                <th>Endereço</th>
                <th>Idade</th>
                <th>Telefone/Celular</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Murilo Henrique Wippel</td>
                <td>Programador</td>
                <td>Rua Carlos Laemmle 203 - Centro - Presidente Getúlio (SC)</td>
                <td>21</td>
                <td>(47)99162-6652</td>
                <td style="text-align: center;"><a href="<?= base_url("index.php/clientes/novo") ?>" class="btn btn-primary">Editar</a></td>
                <td style="text-align: center;"><a href="<?= base_url("index.php/clientes/novo") ?>" class="btn btn-danger">Apagar</a></td>
              </tr>
            </tbody>
            <tbody>
              <tr>
                <td>Jullian Hermann Creutzberg</td>
                <td>Orientador</td>
                <td>Rua do Jullian</td>
                <td>28</td>
                <td>(47)99999-9999</td>
                <td style="text-align: center;"><a href="<?= base_url("index.php/clientes/novo") ?>" class="btn btn-primary">Editar</a></td>
                <td style="text-align: center;"><a href="<?= base_url("index.php/clientes/novo") ?>" class="btn btn-danger">Apagar</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Atualizado em 11:59</div>
    </div>


  </div>
  <!--CONTAINER DE CONTEÚDOS-->