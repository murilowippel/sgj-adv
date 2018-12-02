<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1 style="margin-left: 2%;">Cadastro de Usuário</h1>
    <!--<hr>-->
    
    <div class="clear"></div>
    
    <div class="col-md-10">
      <form id="formUsuarios" action="<?= base_url("usuarios/gravar") ?>" method="post">
        <div class="borda">
          <input type="hidden" name="idusuario" value="<?php if (isset($usuario)) { echo $usuario['idusuario']; } ?>" />

          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="nome"><strong>Nome: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="nome" class="form-control" id="nome" placeholder="" value="<?php if (isset($usuario)) { echo $usuario['nome']; } ?>">
              <?= form_error("nome") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="email"><strong>E-mail: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="email" class="form-control" id="email" placeholder="" value="<?php if (isset($usuario)) { echo $usuario['email']; } ?>">
              <?= form_error("email") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="senha"><strong>Senha: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="password" name="senha" class="form-control" id="nome" placeholder="" value="">
              <?= form_error("senha") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="cpf"><strong>CPF: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <input type="text" name="cpf" class="form-control" id="cpf" placeholder="" value="<?php if (isset($usuario)) { echo $usuario['cpf']; } ?>">
              <?= form_error("cpf") ?>
            </div>
          </div>
          
          <div class="form-row col-md-12">
            <div class="form-group col-md-4">
              <label for="nvlacesso"><strong>Tipo de Usuário: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <select id="nvlacesso" name="nvlacesso" class="form-control">
                <option></option>
                <option value="A" <?php if (isset($usuario) && $usuario['nvlacesso'] == "A") { echo "selected"; } ?>>Advogado</option>
                <option value="X" <?php if (isset($usuario) && $usuario['nvlacesso'] == "X") { echo "selected"; } ?>>Auxiliar</option>
                <option value="C" <?php if (isset($usuario) && $usuario['nvlacesso'] == "C") { echo "selected"; } ?>>Cliente</option>
              </select>
              <?= form_error("nvlacesso") ?>
            </div>
            <div class="form-group col-md-4">
              <label for="myonoffswitch2"><strong>Acesso Liberado: <span class="obrigatorio">(obrigatório)</span></strong></label>
              <div class="onoffswitch2">
                  <input type="checkbox" name="liberado" class="onoffswitch2-checkbox" id="myonoffswitch2" checked>
                  <label class="onoffswitch2-label" for="myonoffswitch2">
                      <span value="1" class="onoffswitch2-inner"></span>
                      <span value="2" class="onoffswitch2-switch"></span>
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
      $('#formUsuarios')[0].reset();
    });

  });
</script>
