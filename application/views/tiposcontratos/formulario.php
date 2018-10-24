<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Tipos de Contrato</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-5">
      <form id="formTiposContratos" action="<?= base_url("tiposcontratos/gravar") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idtipocontrato" value="<?php if (isset($tipocontrato)) { echo $tipocontrato['idtipocontrato']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-12">
              <label for="nome"><strong>Nome: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($tipocontrato)) { echo $tipocontrato['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("tiposcontratos") ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("tiposcontratos/novo") ?>" class="btn btn-primary">Limpar</a>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          </div>
        
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {
    $("#limpar").click(function () {
      $('#formTiposContratos')[0].reset();
    });

  });
</script>