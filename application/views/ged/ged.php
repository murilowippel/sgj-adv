<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Gerenciamento de Documentos Eletrônicos</h1>
    <hr>
    <!--Conteúdo da Página-->
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("ged/novo") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary">Novo</a>
    </div>
    <div class="clear"></div>
    <!--Tabela-->
    <div class="card mb-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nome</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Modelo de Contrato de Prestação de Serviços</td>
                <td style="text-align: center; width: 122px;"><a href="<?= base_url("/tiposcontratos/") ?>" class="btn btn-success">Baixar Arquivo</a></td>
                <td style="text-align: center; width: 122px;"><a href="<?= base_url("/tiposcontratos/") ?>" class="btn btn-primary">Editar</a></td>
                <td style="text-align: center; width: 122px;">
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
          <h5 class="modal-title" id="exampleModalLabel">Excluir Tipo de Contrato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Deseja excluir o tipo de contrato selecionado?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a href="<?= base_url("/tiposcontratos/deletar?idtipocontrato=") ?>" class="btn btn-danger">Sim</a>
        </div>
      </div>
    </div>
  </div>