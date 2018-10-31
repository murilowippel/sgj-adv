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
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Titulo</th>
                <th>Nº do Processo</th>
                <th>Cliente</th>
                <th>Data de Abertura</th>
                <th>Descrição</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Partilha de Herança</td>
                <td>12345679</td>
                <td>Murilo Henrique Wippel</td>
                <td>01/12/2018</td>
                <td>Processo para realização da partilha dos bens do sr. Murilo Henrique Wippel...</td>
                <td style="text-align: center;"><a href="<?= base_url("/processos/atualizacoes/1") ?>" class="btn btn-light">Atualizações</a></td>
                <td style="text-align: center;"><a href="<?= base_url("/processos/novo") ?>" class="btn btn-primary">Editar</a></td>
                <td style="text-align: center;"><a href="<?= base_url("/processos/novo") ?>" class="btn btn-danger">Apagar</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>