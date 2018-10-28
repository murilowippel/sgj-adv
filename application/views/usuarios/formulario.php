<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Usuário</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-10">
      <form id="formClientes" action="<?= base_url("clientes/gravar") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idcliente" value="<?php if (isset($cliente)) { echo $cliente['idcliente']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="nome"><strong>Nome: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($cliente)) { echo $cliente['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="nome"><strong>E-mail: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($cliente)) { echo $cliente['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="nome"><strong>Senha: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="password" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($cliente)) { echo $cliente['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="cpfcnpj"><strong>CPF/CNPJ: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj" placeholder="" value="<?php if (isset($cliente)) { echo $cliente['cpfcnpj']; } ?>">
              <?= form_error("cpfcnpj") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="estado"><strong>Tipo de Usuário: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="estado" name="estado" class="form-control">
                <option></option>
                <option>Advogado</option>
                <option>Auxiliar</option>
                <option>Cliente</option>
              </select>
              <?= form_error("estado") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="myonoffswitch2"><strong>Acesso Liberado: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <div class="onoffswitch2">
                  <input type="checkbox" name="onoffswitch2" class="onoffswitch2-checkbox" id="myonoffswitch2" checked>
                  <label class="onoffswitch2-label" for="myonoffswitch2">
                      <span class="onoffswitch2-inner"></span>
                      <span class="onoffswitch2-switch"></span>
                  </label>
              </div>
            </div>
          </div>
          
          <div class="col-md-12" style="text-align: right;">
            <a href="<?= base_url("usuarios") ?>" class="btn btn-danger">Voltar</a>
            <a href="<?= base_url("usuarios/novo") ?>" class="btn btn-primary">Limpar</a>
            <button type="submit" class="btn btn-success" style="margin-right: 11px">Gravar</button>
          </div>
        
        </div>
        
      </form>
    </div>

  </div>
  
<script type="text/javascript">
  $(document).ready(function () {
    $('#datanascimento').mask('00/00/0000');
    $('#cep').mask('00000-000');
    $('#telefone').mask('(00) 0000-0000');
    $('#celular').mask('(00) 00000-0000');

    $("#limpar").click(function () {
      $('#formClientes')[0].reset();
    });

  });
</script>
