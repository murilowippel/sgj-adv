<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Atualização de Processo</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-8">
      <form id="formAtualizacaoProcesso" action="<?= base_url("processos/gravaratualizcao") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idprocesso" value="<?php if (isset($processo)) { echo $processo['idprocesso']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="titulo"><strong>Título: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input maxlength="250" type="text" name="titulo" class="form-control" id="titulo" placeholder="" value="<?php if (isset($contrato)) { echo $contrato['titulo']; } ?>">
              <?= form_error("titulo") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="dataabertura"><strong>Data da Atualização:</strong></label>
              <input type="text" name="dataabertura" class="form-control" id="dataabertura" placeholder="" value="<?php if (isset($processo)) { echo dataPostgresParaPtBr($processo['datainiciovigencia']); } ?>">
              <?= form_error("datainiciovigencia") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="descricao"><strong>Descrição:</strong></label>
              <!--<input type="text" name="dscricao" class="form-control" id="dscricao" placeholder="" value="<?php if (isset($contrato)) { echo $contrato['dscricao']; } ?>">-->
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"></textarea>
              <?= form_error("titulo") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="nmarquivo"><strong>Arquivo (PDF ou WORD):</strong></label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("processos/atualizacoes") ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("processos/novaatualizacao") ?>" class="btn btn-primary">Limpar</a>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          </div>
        
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {
    $('#dataabertura').mask('00/00/0000');

    $("#limpar").click(function () {
      $('#formAtualizacaoProcesso')[0].reset();
    });

  });
</script>