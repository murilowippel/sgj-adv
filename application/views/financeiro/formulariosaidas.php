<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Saídas Financeiras</h1>
    <!--<hr>-->

    <div class="clear"></div>

    <div class="col-md-10">
      <form id="formTiposContratos" action="<?=base_url("tiposcontratos/gravar")?>" method="post">
        <div class="borda">
          <input type="hidden" name="idtipocontrato" value="<?php if (isset($tipocontrato)) {echo $tipocontrato['idtipocontrato'];}?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="estado"><strong>Centro de Custo: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="estado" name="estado" class="form-control">
                <option selected></option>
                <option value="AC">Ações de Conciliação</option>
                <option value="AC">Manutenção do Escritório</option>
              </select>
              <?=form_error("estado")?>
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="descricao"><strong>Descrição: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <!--<input type="text" name="dscricao" class="form-control" id="dscricao" placeholder="" value="<?php if (isset($contrato)) {echo $contrato['dscricao'];}?>">-->
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"></textarea>
              <?=form_error("titulo")?>
            </div>
            <div class="form-group col-md-4">
              <label for="datainiciovigencia"><strong>Valor: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="datainiciovigencia" class="form-control" id="datainiciovigencia" placeholder="" value="<?php if (isset($cliente)) {echo dataPostgresParaPtBr($cliente['datainiciovigencia']);}?>">
              <?=form_error("datainiciovigencia")?>
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="datainiciovigencia"><strong>Data de Pagamento: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="datainiciovigencia" class="form-control" id="datainiciovigencia" placeholder="" value="<?php if (isset($cliente)) {echo dataPostgresParaPtBr($cliente['datainiciovigencia']);}?>">
              <?=form_error("datainiciovigencia")?>
            </div>
            <div class="form-group col-md-4">
              <label for="datafimvigencia"><strong>Data de Vencimento:</strong></label>
              <input type="text" name="datafimvigencia" class="form-control" id="datafimvigencia" placeholder="" value="<?php if (isset($cliente)) {echo dataPostgresParaPtBr($cliente['datafimvigencia']);}?>">
              <?=form_error("datafimvigencia")?>
            </div>
          </div>

          <div class="col-md-12" style="text-align: right;">
            <a href="<?=base_url("tiposcontratos")?>" class="btn btn-danger">Voltar</a>
            <a href="<?=base_url("tiposcontratos/novo")?>" class="btn btn-primary">Limpar</a>
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