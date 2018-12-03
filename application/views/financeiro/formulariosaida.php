<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Saídas Financeiras</h1>
    <!--<hr>-->

    <div class="clear"></div>

    <div class="col-md-10">
      <form id="formSaidas" action="<?=base_url("saidas/gravar")?>" method="post">
        <div class="borda">
          <input type="hidden" name="idsaida" value="<?php if (isset($saida)) {echo $saida['idsaida'];}?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="idcentrocusto"><strong>Centro de Custo: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="idcentrocusto" name="idcentrocusto" class="form-control">
                <option selected></option>
                <?php foreach ($centrocustos as $centrocusto) : ?>
                  <?php if($saida['idcentrocusto'] == $centrocusto['idcentrocusto']){ ?>
                    <option value="<?= $centrocusto['idcentrocusto'] ?>" selected><?= $centrocusto['nome'] ?></option>
                  <?php } else { ?>
                    <option value="<?= $centrocusto['idcentrocusto'] ?>"><?= $centrocusto['nome'] ?></option>
                  <?php } ?>
                <?php endforeach; ?>
              </select>
              <?=form_error("idcentrocusto")?>
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="descricao"><strong>Descrição: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"><?php if (isset($saida)) {echo $saida['descricao'];}?></textarea>
              <?=form_error("descricao")?>
            </div>
            <div class="form-group col-md-4">
              <label for="valor"><strong>Valor: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="valor" class="form-control" id="valor" placeholder="" value="<?php if (isset($saida)) {echo $saida['valor'];}?>">
              <?=form_error("valor")?>
            </div>
          </div>

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="datapagamento"><strong>Data de Pagamento: </strong></label>
              <input type="text" name="datapagamento" class="form-control" id="datapagamento" placeholder="" value="<?php if (isset($saida) && $saida['datapagamento'] != "") {echo dataPostgresParaPtBr($saida['datapagamento']);}?>">
              <?=form_error("datainiciovigencia")?>
            </div>
            <div class="form-group col-md-4">
              <label for="datavencimento"><strong>Data de Vencimento:</strong></label>
              <input type="text" name="datavencimento" class="form-control" id="datavencimento" placeholder="" value="<?php if (isset($saida) && $saida['datavencimento'] != "") {echo dataPostgresParaPtBr($saida['datavencimento']);}?>">
              <?=form_error("datavencimento")?>
            </div>
          </div>

          <div class="col-md-12" style="text-align: right;">
            <a href="<?=base_url("saidas")?>" class="btn btn-danger">Voltar</a>
            <a href="<?=base_url("saidas/novo")?>" class="btn btn-primary">Limpar</a>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          </div>

        </div>

      </form>
    </div>

  </div>

<script type="text/javascript">
  $(document).ready(function () {
    $("#limpar").click(function () {
      $('#formSaidas')[0].reset();
    });

  });
</script>