<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Evento</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-8">
      <form id="formEvento" action="<?= base_url("agenda/gravar") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idcompromisso" value="<?php if (isset($compromisso)) { echo $compromisso['idcompromisso']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-12">
              <label for="titulo"><strong>Título: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="titulo" class="form-control" id="titulo" placeholder="" value="<?php if (isset($compromisso)) { echo $compromisso['titulo']; } ?>">
              <?= form_error("titulo") ?>
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="descricao"><strong>Descrição: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"><?php if (isset($compromisso)) { echo $compromisso['descricao']; } ?></textarea>
              <?= form_error("descricao") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="local"><strong>Local:</strong></label>
              <textarea class="form-control rounded-1" id="local" name="local" rows="3" style="resize: none;"><?php if (isset($compromisso)) { echo $compromisso['local']; } ?></textarea>
              <?= form_error("local") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="datacompromisso"><strong>Data: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="datacompromisso" class="form-control" id="datacompromisso" placeholder="" value="<?php if (isset($compromisso)) { echo dataPostgresParaPtBr($compromisso['datacompromisso']); } ?>">
              <?= form_error("datacompromisso") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="horariocompromisso"><strong>Horário: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="horariocompromisso" class="form-control" id="horariocompromisso" placeholder="" value="<?php if (isset($compromisso)) { echo $compromisso['horariocompromisso']; } ?>">
              <?= form_error("horariocompromisso") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="idusuarios"><strong>Usuários relacionados: <span class="obrigatorio">(obrigatório)</span></strong></label><br/>
              <select name="idusuarios[]" id="option-droup-demo" multiple="multiple" style="width: 474px !important;" required>
                <?php foreach ($usuarios as $usuario) : ?>
                    <option value="<?= $usuario['idusuario'] ?>"><?= $usuario['nome'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("agenda") ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("agenda/novo") ?>" class="btn btn-primary">Limpar</a>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          </div>
        
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {
    $('#datacompromisso').mask('00/00/0000');
    $('#horariocompromisso').mask('00:00:00');

    $("#limpar").click(function () {
      $('#formEvento')[0].reset();
    });
    $('#option-droup-demo').multiselect({
      enableClickableOptGroups: true
    });

  });
</script>
