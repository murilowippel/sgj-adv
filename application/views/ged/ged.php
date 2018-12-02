<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Gerenciamento Eletrônico de Documentos</h1>
    <hr>
    <!--Conteúdo da Página-->
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("ged/novo") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary">Novo</a>
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
                <th>Nome</th>
                <th>Data de Cadastro</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
                foreach ($documentos as $documento) : ?>
                  <tr>
                    <td><?= $documento['nome'] ?></td>
                    <td><?= dataPostgresParaPtBr($documento['datacadastro']) ?></td>
                    <td><a href="<?= base_url("/ged/download/").$documento['nmarquivo'].".".$documento['extarquivo'] ?>" class="btn "><i class="fa fa-download"></i> Baixar</a></td>
                    <td style="text-align: center;"><a href="<?= base_url("/ged/") ?><?= $documento['iddocumento'] ?>" class="btn btn-primary">Editar</a></td>
                    <td style="text-align: center;">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletaModal<?= $documento['iddocumento'] ?>">
                        Excluir
                      </button>
                    </td>
                  </tr>
                  
                  <div class="modal fade" id="deletaModal<?= $documento['iddocumento'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Apagar Documento</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Deseja apagar o documento selecionado?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <a href="<?= base_url("/ged/deletar?iddocumento=") ?><?= $documento['iddocumento'] ?>" class="btn btn-danger">Sim</a>
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