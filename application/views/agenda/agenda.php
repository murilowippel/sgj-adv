<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Agenda</h1>
    <hr>
    <!--Conteúdo da Página-->
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("agenda/novo") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary">Novo</a>
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
                <th>Descrição</th>
                <th>Data</th>
                <th>Local</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($compromissos as $compromisso) : ?>
                <tr>
                  <td><?= $compromisso['titulo'] ?></td>
                  <td><?= $compromisso['descricao'] ?></td>
                  <td><?= dataPostgresParaPtBr($compromisso['datacompromisso']) ?></td>
                  <td><?= $compromisso['local'] ?></td>
                  <td style="text-align: center; width: 122px;"><a href="<?= base_url("/agenda/") ?><?= $compromisso['idcompromisso'] ?>" class="btn btn-primary">Editar</a></td>
                  <td style="text-align: center; width: 122px;">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletaModal<?= $compromisso['idcompromisso'] ?>">
                      Excluir
                    </button>
                  </td>
                </tr>

              <div class="modal fade" id="deletaModal<?= $compromisso['idcompromisso'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Excluir Compromisso</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Deseja excluir o compromisso selecionado?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <a href="<?= base_url("/agenda/deletar?idcompromisso=") ?><?= $compromisso['idcompromisso'] ?>" class="btn btn-danger">Sim</a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>