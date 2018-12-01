<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Contratos</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-10">
      <form id="formContratos" action="<?= base_url("contratos/gravar") ?>" method="post" enctype="multipart/form-data">
        <div class="borda">
          <input type="hidden" name="idcontrato" value="<?php if (isset($contrato)) { echo $contrato['idcontrato']; } ?>" />
          
          <!--idcliente, idtipocontrato, titulo-->
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="titulo"><strong>Título: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="titulo" class="form-control" id="titulo" placeholder="" value="<?php if (isset($contrato)) { echo $contrato['titulo']; } ?>">
              <?= form_error("titulo") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="idcliente"><strong>Cliente: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="idcliente" name="idcliente" class="form-control">
                <option selected></option>
                <?php foreach ($clientes as $cliente) : ?>
                  <?php if($contrato['idcliente'] == $cliente['idcliente']){ ?>
                    <option value="<?= $cliente['idcliente'] ?>" selected><?= $cliente['nome'] ?></option>
                  <?php } else { ?>
                    <option value="<?= $cliente['idcliente'] ?>"><?= $cliente['nome'] ?></option>
                  <?php } ?>
                <?php endforeach; ?>
              </select>
              <?= form_error("idcliente") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="idtipocontrato"><strong>Tipo de Contrato: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="idtipocontrato" name="idtipocontrato" class="form-control">
                <option selected></option>
                <?php foreach ($tipocontratos as $tipocontrato) : ?>
                  <?php 
                    if($tipocontrato['idtipocontrato'] == $contrato['idtipocontrato']){ ?>
                      <option value="<?= $tipocontrato['idtipocontrato'] ?>" selected><?= $tipocontrato['nome'] ?></option>
                  <?php } else { ?>
                      <option value="<?= $tipocontrato['idtipocontrato'] ?>"><?= $tipocontrato['nome'] ?></option>
                  <?php } ?>
                  ?>
                <?php endforeach; ?>
              </select>
              <?= form_error("idtipocontrato") ?>
            </div>
          </div>
          
          <!--descricao, nmarquivo-->
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="descricao"><strong>Descrição: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <textarea class="form-control rounded-1" id="descricao" name="descricao" rows="3" style="resize: none;"><?php if (isset($contrato)) { echo $contrato['descricao']; } ?></textarea>
              <?= form_error("descricao") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="nmarquivo"><strong>Arquivo (PDF ou WORD): <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="file" name="nmarquivo" class="form-control-file" <?php if (!isset($contrato)) { echo "required"; } ?>>
            </div>
          </div>
          
          <!--datainiciovigencia, datafimvigencia-->
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="datainiciovigencia"><strong>Início da Vigência: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="datainiciovigencia" class="form-control" id="datainiciovigencia" placeholder="" value="<?php if (isset($contrato)) { echo dataPostgresParaPtBr($contrato['datainiciovigencia']); } ?>">
              <?= form_error("datainiciovigencia") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="datafimvigencia"><strong>Fim da Vigência:</strong></label>
              <input type="text" name="datafimvigencia" class="form-control" id="datafimvigencia" placeholder="" value="<?php if (isset($contrato)) { if($contrato['datafimvigencia'] != "") { echo dataPostgresParaPtBr($contrato['datafimvigencia']); } } ?>">
              <?= form_error("datafimvigencia") ?>
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
          <a href="<?= base_url("contratos") ?>" class="btn btn-danger">Voltar</a>
          <a href="<?= base_url("contratos/novo") ?>" class="btn btn-primary">Limpar</a>
          <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          
        </div>
        
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {
    $('#datainiciovigencia').mask('00/00/0000');
    $('#datafimvigencia').mask('00/00/0000');

    $("#limpar").click(function () {
      $('#formContratos')[0].reset();
    });

  });
</script>

