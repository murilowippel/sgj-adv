  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Agenda</h1>
    <hr>
    <!--Conteúdo da Página-->
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("clientes/novo") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary">Novo</a>
    </div>
    <!--Tabela-->
    <div class="card mb-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data</th>
                <th>Local</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Audiência de Conciliação</td>
                <td>Audiência de Conciliação do processo n 12334</td>
                <td>10/12/2018</td>
                <td>Fórum de Presidente Getúlio</td>
                <td style="text-align: center;"><a href="<?= base_url("/clientes/") ?>" class="btn btn-primary">Editar</a></td>
                <td style="text-align: center;">
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletaModal">
                    Excluir
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="deletaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Deseja excluir o cliente selecionado?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a href="<?= base_url("/clientes/deletar?idcliente=") ?>" class="btn btn-danger">Sim</a>
        </div>
      </div>
    </div>
  </div>