<!--CONTAINER DE CONTEÚDOS-->
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Page Content -->
    <h1>Atualizações - <?= $processo['titulo'] ?></h1>
    <hr>
    <div style="width: 100%; text-align: right;">
    <a href="<?= base_url("/atualizacoes/novo") ?>" class="btn btn-success">Gerar Relatório</a>
      <a href="<?= base_url("/atualizacoes/novo/") ?><?= $idprocesso ?>" class="btn btn-primary">Novo</a>
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
                <th>Descrição</th>
                <th>Data de atualização</th>
                <th>Arquivo</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($atualizacoes as $atualizacao) : ?>
                <tr>
                  <td><?= $atualizacao['titulo'] ?></td>
                  <td><?= $atualizacao['descricao'] ?></td>
                  <td><?= dataPostgresParaPtBr($atualizacao['dataatualizacao']) ?></td>
                  <td><a href="<?= base_url("/atualizacoes/download/").$atualizacao['nmarquivo'].".".$atualizacao['extarquivo'] ?>" class="btn "><i class="fa fa-download"></i> Baixar</a></td>
                  <td style="text-align: center; width: 122px;"><a href="<?= base_url("/atualizacoes/editar/") ?><?= $atualizacao['idatualizacaoprocesso'] ?>" class="btn btn-primary">Editar</a></td>
                  <td style="text-align: center; width: 122px;">
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletaModal<?= $atualizacao['idatualizacaoprocesso'] ?>">
                      Excluir
                    </button>
                  </td>
                </tr>
                
                <div class="modal fade" id="deletaModal<?= $atualizacao['idatualizacaoprocesso'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Excluir Atualização de Processo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Deseja excluir a atualização de processo selecionada?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a href="<?= base_url("/atualizacoes/deletar?idatualizacaoprocesso=") ?><?= $atualizacao['idatualizacaoprocesso'] ?>" class="btn btn-danger">Sim</a>
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
  <!--CONTAINER DE CONTEÚDOS-->