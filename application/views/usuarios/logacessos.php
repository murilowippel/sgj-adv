<!--CONTAINER DE CONTEÚDOS-->
<div id="content-wrapper">
  <div class="container-fluid">
    <!-- Page Content -->
    <h1>Registro de Acessos</h1>
    <hr>
    <div class="clear"></div>
    <!-- DataTables Example -->
    <div class="card mb-3">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="text-align: center;">Usuário</th>
                <th style="text-align: center;">Data e Hora</th>
                <th style="text-align: center;">IP</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($logacessos as $logacesso) : 
                $data = dataPostgresParaPtBr(substr($logacesso['datahracesso'], 0, 10));
                $data .= " - ".substr($logacesso['datahracesso'], 11);
                $usuario = $this->usuario_model->buscaUsuario($logacesso['idusuario']);
                ?>
                <tr>
                  <td style="text-align: center;"><?= $usuario['nome'] ?></td>
                  <td style="text-align: center;"><?= $data ?></td>
                  <td style="text-align: center;"><?= $logacesso['ipusuario'] ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>
  <!--CONTAINER DE CONTEÚDOS-->