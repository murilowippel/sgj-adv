<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Centros de Custo</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-5">
      <form id="formCentroCusto" action="<?= base_url("centrocusto/gravar") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idcentrocusto" value="<?php if (isset($centrocusto)) { echo $centrocusto['idcentrocusto']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-12">
              <label for="nome"><strong>Nome: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($centrocusto)) { echo $centrocusto['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("centrocusto") ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("centrocusto/novo") ?>" class="btn btn-primary">Limpar</a>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          </div>
        
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {
    $("#limpar").click(function () {
      $('#formCentroCusto')[0].reset();
    });

  });
</script>