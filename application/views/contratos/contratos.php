<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Contratos</h1>
    <hr>
    <!--Conteúdo da Página-->
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("/contratos/novo") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary">Novo</a>
    </div>
    <div class="clear"></div>
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
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Título</th>
                <th>Cliente</th>
                <th>Tipo de Contrato</th>
                <th>Data de Início da Vigência</th>
                <th>Data de Fim da Vigência</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($contratos as $contratos) : ?>
                <tr>
                  <td></td>
                  <td style="text-align: center;"><a href="<?= base_url("/contratos/") ?><?= $contratos['idcontrato'] ?>" class="btn btn-primary">Editar</a></td>
                  <td style="text-align: center;"><a href="#" class="btn btn-primary">Baixar</a></td>
                  <td style="text-align: center;">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletaModal">
                      Excluir
                    </button>
                  </td>
                </tr>
              <?php endforeach ?>
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
          <h5 class="modal-title" id="exampleModalLabel">Apagar Contrato</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Deseja apagar o contrato selecionado?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <a href="<?= base_url("/contratos/deletar?idcontrato=") ?><?= $contratos['idcontrato'] ?>" class="btn btn-danger">Sim</a>
        </div>
      </div>
    </div>
  </div>
