<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Atualização de Processo</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    <div class="col-md-8">
      <form id="formAtualizacaoProcesso" action="<?= base_url("atualizacoes/gravar") ?>" method="post" enctype="multipart/form-data">
        <div class="borda">
          
          <input type="hidden" name="idatualizacaoprocesso" value="<?php if (isset($atualizacaoprocesso)) { echo $atualizacaoprocesso['idatualizacaoprocesso']; } ?>" />
          <input type="hidden" name="idprocesso" value="<?= $idprocesso ?>" />
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="titulo"><strong>Título: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input maxlength="250" type="text" name="titulo" class="form-control" id="titulo" placeholder="" value="<?php if (isset($atualizacaoprocesso)) { echo $atualizacaoprocesso['titulo']; } ?>">
              <?= form_error("titulo") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="dataatualizacao"><strong>Data da Atualização: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="dataatualizacao" class="form-control" id="dataatualizacao" placeholder="" value="<?php if (isset($atualizacaoprocesso)) { echo dataPostgresParaPtBr($atualizacaoprocesso['dataatualizacao']); } ?>">
              <?= form_error("dataatualizacao") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="descricao"><strong>Descrição: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"><?php if (isset($atualizacaoprocesso)) { echo $atualizacaoprocesso['descricao']; } ?></textarea>
              <?= form_error("descricao") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="nmarquivo"><strong>Arquivo (PDF ou WORD):</strong></label>
              <input type="file" name="nmarquivo" class="form-control-file" id="exampleFormControlFile1">
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("atualizacoes/") ?><?= $idprocesso ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("atualizacoes/novo/") ?><?= $idprocesso ?>" class="btn btn-primary">Limpar</a>
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
    $('#dataatualizacao').mask('00/00/0000');

    $("#limpar").click(function () {
      $('#formAtualizacaoProcesso')[0].reset();
    });

  });
</script>