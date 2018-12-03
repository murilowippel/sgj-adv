<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Processo</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-10">
      <form id="formProcesso" action="<?= base_url("processos/gravar") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idprocesso" value="<?php if (isset($processo)) { echo $processo['idprocesso']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="titulo"><strong>Título: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input maxlength="250" type="text" name="titulo" class="form-control" id="titulo" placeholder="" value="<?php if (isset($processo)) { echo $processo['titulo']; } ?>">
              <?= form_error("titulo") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="numero"><strong>Nº do processo:</strong></label>
              <input type="text" name="numero" class="form-control" id="numero" placeholder="" value="<?php if (isset($processo)) { echo $processo['numero']; } ?>">
              <?= form_error("numero") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="idcliente"><strong>Cliente: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="idcliente" name="idcliente" class="form-control">
                <option selected></option>
                <?php foreach ($clientes as $cliente) : ?>
                  <?php if($processo['idcliente'] == $cliente['idcliente']){ ?>
                    <option value="<?= $cliente['idcliente'] ?>" selected><?= $cliente['nome'] ?></option>
                  <?php } else { ?>
                    <option value="<?= $cliente['idcliente'] ?>"><?= $cliente['nome'] ?></option>
                  <?php } ?>
                <?php endforeach; ?>
              </select>
              <?= form_error("idcliente") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="descricao"><strong>Descrição:</strong></label>
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"><?php if (isset($processo)) { echo $processo['descricao']; } ?></textarea>
              <?= form_error("descricao") ?>
            </div>
            
            <div class="form-group col-md-4">
              <label for="idcontrato"><strong>Contrato: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="idcontrato" name="idcontrato" class="form-control">
                <option selected></option>
                <?php foreach ($contratos as $contrato) : ?>
                  <?php if($processo['idcontrato'] == $contrato['idcontrato']){ ?>
                    <option value="<?= $contrato['idcontrato'] ?>" selected><?= $contrato['titulo'] ?></option>
                  <?php } else { ?>
                    <option value="<?= $contrato['idcontrato'] ?>"><?= $contrato['titulo'] ?></option>
                  <?php } ?>
                <?php endforeach; ?>
              </select>
              <?= form_error("idcontrato") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="valorhonorario"><strong>Valor dos Honorários: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="valorhonorario" class="form-control" id="valorhonorario" placeholder="" value="<?php if (isset($processo)) { echo $processo['valorhonorario']; } ?>">
              <?= form_error("titulo") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="dataabertura"><strong>Data de Abertura:</strong></label>
              <input type="text" name="dataabertura" class="form-control" id="dataabertura" placeholder="" value="<?php if (isset($processo) && $processo['dataabertura'] != "") { echo dataPostgresParaPtBr($processo['dataabertura']); } ?>">
              <?= form_error("dataabertura") ?>
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("processos") ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("processos/novo") ?>" class="btn btn-primary">Limpar</a>
            <?php
              if ($this->session->userdata['usuario_logado']['nvlacesso'] != "C") { ?>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
             <?php } ?>
          </div>
        
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {
    $('#dataabertura').mask('00/00/0000');
    //$('#valorhonorario').mask('000.000.000.000.000,00', {reverse: true});
    $("#limpar").click(function () {
      $('#formProcesso')[0].reset();
    });

  });
</script>