<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Page Content -->
    <h1>Processos</h1>
    <hr>
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("/processos/novo") ?>" class="btn btn-primary">Novo</a>
    </div>
    <div class="clear"></div>
    <?php if ($this->session->flashdata("success")) : ?>
      <p class="alert alert-success"><?= $this->session->flashdata("success") ?></p>
    <?php endif ?>

    <?php if ($this->session->flashdata("danger")) : ?>
      <p class="alert alert-danger"><?= $this->session->flashdata("danger") ?></p>
    <?php endif ?>
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
              <?php 
                foreach ($processos as $processo) : 
                  $cliente = $this->cliente_model->buscaCliente($processo['idcliente']); ?>
                  <tr>
                    <td><?= $processo['titulo'] ?></td>
                    <td><?= $processo['numero'] ?></td>
                    <td><?=  $cliente['nome'] ?></td>
                    <td><?php if($processo['dataabertura'] != ""){ echo dataPostgresParaPtBr($processo['dataabertura']); } ?></td>
                    <td><?= $processo['descricao'] ?></td>
                    <td style="text-align: center;"><a href="<?= base_url("/atualizacoes/") ?><?= $processo['idprocesso'] ?>" class="btn btn-light">Atualizações</a></td>
                    <td style="text-align: center;"><a href="<?= base_url("/processos/") ?><?= $processo['idprocesso'] ?>" class="btn btn-primary">Editar</a></td>
                    <td style="text-align: center;">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletaModal<?= $processo['idprocesso'] ?>">
                        Excluir
                      </button>
                    </td>
                  </tr>
                  
                  <div class="modal fade" id="deletaModal<?= $processo['idprocesso'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Apagar Processo</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Deseja apagar o processo selecionado?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <a href="<?= base_url("/processos/deletar?idprocesso=") ?><?= $processo['idprocesso'] ?>" class="btn btn-danger">Sim</a>
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