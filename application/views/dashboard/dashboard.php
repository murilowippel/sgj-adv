<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Página Inicial</h1>
    <hr>
    <!--Conteúdo da Página-->

    <!-- DataTables Example -->
    <?php if ($this->session->userdata['usuario_logado']['nvlacesso'] != "C") { ?>
      <div class="row">
        <div class="col-md-4">
          <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-calendar-alt"></i>
                Compromissos do Dia</div>
              <div class="panel-body">
                <div class="list-group">
                  <?php if (count($compromissos) < 1) { ?>
                    <a href ="<?= base_url("/agenda/") ?>" class = "list-group-item">
                      <i class = "fa fa-angle-double-right fa-fw"></i>Não há compromissos para hoje
                    </a>
                  <?php } ?>
                  <?php foreach ($compromissos as $compromisso) : ?>
                    <a href ="<?= base_url("/agenda/") ?><?= $compromisso['idcompromisso'] ?>" class = "list-group-item">
                      <i class = "fa fa-angle-double-right fa-fw"></i><?= $compromisso['titulo'] ?>
                      <span class = "pull-right text-muted small"><em><?= $compromisso['local'] ?> <?= dataPostgresParaPtBr($compromisso['datacompromisso']) ?> - <?= $compromisso['horariocompromisso'] ?></em>
                      </span>
                    </a>
                  <?php endforeach
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-dollar-sign"></i>
                Pendências Financeiras</div>
              <div class="panel-body">
                <div class="list-group">
                  <?php if (count($entradas) < 1 && count($saidas) < 1) { ?>
                    <a href ="#" class = "list-group-item">
                      <i class = "fa fa-check fa-fw"></i>Não há pendências financeiras
                    </a>
                  <?php } ?>
                  <?php foreach ($entradas as $entrada) : ?>
                    <a href ="<?= base_url("/entradas/") ?><?= $entrada['identrada'] ?>" class = "list-group-item">
                      <i class = "fa fa-arrow-right fa-fw""></i><?= $entrada['descricao'] ?>
                    </a>
                  <?php endforeach ?>

                  <?php foreach ($saidas as $saida) : ?>
                    <a href ="<?= base_url("/saidas/") ?><?= $saida['idsaida'] ?>" class = "list-group-item">
                      <i class = "fa fa-arrow-left fa-fw""></i><?= $saida['descricao'] ?>
                    </a>
                  <?php endforeach ?>

                  <!--                <a href="#" class="list-group-item">
                                    <i class="fa fa-arrow-right fa-fw"></i> Receber honorários João Silva
                                  </a>
                  
                                  <a href="#" class="list-group-item">
                                    <i class="fa fa-arrow-right fa-fw"></i> Receber honorários Maria Silva
                                  </a>
                                  <a href="#" class="list-group-item">
                                    <i class="fa fa-arrow-left fa-fw"></i> Pagar conserto do banheiro
                                  </a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="col-md-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-bell"></i>
                Notificações</div>
              <div class="panel-body">
                <div class="list-group">
                  <a href="#" class="list-group-item">
                    <i class="fa fa-comment fa-fw"></i> Você tem um novo compromisso
                    <span class="pull-right text-muted small"><em>Recebido em 10/10/2010 - 10:10</em>
                    </span>
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-comment fa-fw"></i> Você tem um novo compromisso
                    <span class="pull-right text-muted small"><em>Recebido em 10/10/2010 - 10:10</em>
                    </span>
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-comment fa-fw"></i> Você tem um novo compromisso
                    <span class="pull-right text-muted small"><em>Recebido em 10/10/2010 - 10:10</em>
                    </span>
                  </a>
                  <a href="#" class="list-group-item">
                    <i class="fa fa-comment fa-fw"></i> Você tem um novo compromisso
                    <span class="pull-right text-muted small"><em>Recebido em 10/10/2010 - 10:10</em>
                    </span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
















    </div>
