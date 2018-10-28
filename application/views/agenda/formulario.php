<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Evento</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-8">
      <form id="formEvento" action="<?= base_url("agenda/gravar") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idcliente" value="<?php if (isset($cliente)) { echo $cliente['idcliente']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-12">
              <label for="nome"><strong>Título: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($cliente)) { echo $cliente['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="descricao"><strong>Descrição: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <!--<input type="text" name="dscricao" class="form-control" id="dscricao" placeholder="" value="<?php if (isset($contrato)) { echo $contrato['dscricao']; } ?>">-->
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"></textarea>
              <?= form_error("titulo") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="descricao"><strong>Local:</strong></label>
              <!--<input type="text" name="dscricao" class="form-control" id="dscricao" placeholder="" value="<?php if (isset($contrato)) { echo $contrato['dscricao']; } ?>">-->
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"></textarea>
              <?= form_error("titulo") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="datacompromisso"><strong>Data: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="datacompromisso" class="form-control" id="datacompromisso" placeholder="" value="<?php if (isset($cliente)) { echo $cliente['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="horario"><strong>Horário: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="horario" class="form-control" id="horario" placeholder="" value="<?php if (isset($cliente)) { echo $cliente['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-12">
              <label for="horario"><strong>Usuários relacionados: <span class="obrigatorio">(obrigatório)</span></strong></label><br/>
              <select id="option-droup-demo" multiple="multiple" style="width: 474px !important;">
                <option value="jQuery">Murilo Wippel</option>
                <option value="Bootstrap">Jullian Creutzberg</option>
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
    $('#horario').mask('00:00');

    $("#limpar").click(function () {
      $('#formEvento')[0].reset();
    });
    $('#option-droup-demo').multiselect({
      enableClickableOptGroups: true
    });

  });
</script>
