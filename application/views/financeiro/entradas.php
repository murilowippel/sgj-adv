<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Financeiro - Entradas</h1>
    <hr>
    <!--Conteúdo da Página-->
    <div style="width: 100%; text-align: right;">
      <a href="<?= base_url("/processos/novaatualizacao") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-success">Gerar Relatório</a>
      <a href="<?= base_url("entradas/novo") ?>" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary">Novo</a>
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
                <th>Descrição</th>
                <th>Centro de Custo</th>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Data de Pagamento</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($entradas as $entrada) : 
                  $cliente = $this->cliente_model->buscaCliente($entrada['idcliente']);
                  $centrocusto = $this->centrocusto_model->buscaCentroCusto($entrada['idcentrocusto']); ?>
                  <tr>
                    <td><?= $entrada['descricao'] ?></td>
                    <td><?= $centrocusto['nome'] ?></td>
                    <td><?= $cliente['nome'] ?></td>
                    <td><?= $entrada['valor'] ?></td>
                    <td><?= dataPostgresParaPtBr($entrada['datapagamento']) ?></td>
                    <td style="text-align: center;"><a href="<?= base_url("/entradas/") ?><?= $entrada['identrada'] ?>" class="btn btn-primary">Editar</a></td>
                    <td style="text-align: center;">
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletaModal<?= $entrada['identrada'] ?>">
                        Excluir
                      </button>
                    </td>
                  </tr>
                  
                  <div class="modal fade" id="deletaModal<?= $entrada['identrada'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Apagar Entrada</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Deseja apagar a entrada selecionada?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                          <a href="<?= base_url("/entradas/deletar?identrada=") ?><?= $entrada['identrada'] ?>" class="btn btn-danger">Sim</a>
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