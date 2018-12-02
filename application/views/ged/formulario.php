<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Documentos</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-8">
      <form id="formDocumento" action="<?= base_url("ged/gravar") ?>" method="post" enctype="multipart/form-data">
        <div class="borda">
          <input type="hidden" name="iddocumento" value="<?php if (isset($documento)) { echo $documento['iddocumento']; } ?>" />
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-6">
              <label for="nome"><strong>Título: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($documento)) { echo $documento['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
            <div class="form-group col-md-6">
              <label for="nmarquivo"><strong>Arquivo (PDF ou WORD): <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="file" name="nmarquivo" class="form-control-file" id="exampleFormControlFile1">
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("ged") ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("ged/novo") ?>" class="btn btn-primary">Limpar</a>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          </div>
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {

    $("#limpar").click(function () {
      $('#formDocumento')[0].reset();
    });

  });
</script>