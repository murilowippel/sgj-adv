<!--CONTAINER DE CONTEÚDOS-->
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= base_url("index.php") ?>">Página Inicial</a>
      </li>
      <li class="breadcrumb-item active">Contratos</li>
    </ol>
    <!-- Page Content -->
    <h1>Contratos</h1>
    <hr>
    <a href="<?= base_url("index.php/contratos/novo") ?>" class="btn btn-primary">Novo</a>
    <div class="clear"></div>
    <hr>
    <!-- DataTables Example -->
    <div class="card mb-3">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nº do Contrato</th>
                <th>Título</th>
                <th>Cliente</th>
                <th>Início de Vigência</th>
                <th>Fim de Vigência</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="text-align: center;">1</td>
                <td>Contrato de Prestação de Serviços</td>
                <td>Murilo Henrique Wippel</td>
                <td>01/01/2018</td>
                <td>01/12/2018</td>
                <td style="text-align: center;"><a href="<?= base_url("index.php/contratos/novo") ?>" class="btn btn-primary">Editar</a></td>
                <td style="text-align: center;"><a href="<?= base_url("index.php/contratos/novo") ?>" class="btn btn-danger">Apagar</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Atualizado em 11:59</div>
    </div>


  </div>
  <!--CONTAINER DE CONTEÚDOS-->