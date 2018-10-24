<!--CONTAINER DE CONTEÚDOS-->
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Page Content -->
    <h1>Processos</h1>
    <hr>
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("/processos/novo") ?>" class="btn btn-primary">Novo</a>
    </div>
    <div class="clear"></div>
    <hr>
    <!-- DataTables Example -->
    <div class="card mb-3">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Nº do Processo</th>
                <th>Cliente</th>
                <th>Data de Abertura</th>
                <th>Descrição</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Partilha de Herança</td>
                <td>12345679</td>
                <td>Jullian Hermann Creutzberg</td>
                <td>01/12/2018</td>
                <td>Processo para realização da partilha dos bens do sr. José da Silva...</td>
                <td style="text-align: center;"><a href="<?= base_url("/processos/novo") ?>" class="btn btn-primary">Editar</a></td>
                <td style="text-align: center;"><a href="<?= base_url("/processos/novo") ?>" class="btn btn-danger">Apagar</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Atualizado em 11:59</div>
    </div>


  </div>
  <!--CONTAINER DE CONTEÚDOS-->