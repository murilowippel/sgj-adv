<script src="<?= base_url("js/jquery.min.js") ?>"></script>
<div id="content-wrapper">
  <div class="container-fluid">
    <h1>Cadastro de Cliente</h1>
    <hr>
    <div class="clear"></div>
    <div class="col-lg-10">
      <form id="formClientes" action="<?= base_url("index.php/clientes/gravar") ?>" method="post">
        <input type="hidden" name="idcliente" value="<?php if(isset($cliente)) { echo $cliente['idcliente']; } ?>" />
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nome"><strong>Nome:</strong></label>
            <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome Completo" value="<?php if(isset($cliente)) { echo $cliente['nome']; } ?>">
            <?= form_error("nome") ?>
          </div>
          <div class="form-group col-md-3">
            <label for="cpfcnpj"><strong>CPF/CNPJ:</strong></label>
            <input type="text" name="cpfcnpj" class="form-control" id="cpfcnpj" placeholder="Ex: 123.456.789-10" value="<?php if(isset($cliente)) { echo $cliente['cpfcnpj']; } ?>">
            <?= form_error("cpfcnpj") ?>
          </div>
          <div class="form-group col-md-3">
            <label for="tppessoa"><strong>Tipo:</strong></label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="tppessoa" id="exampleRadios1" value="F" <?php if(isset($cliente) && $cliente['tppessoa'] == "F") { echo "checked"; } ?>>
              <label class="form-check-label" for="exampleRadios1">
                Física
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="tppessoa" id="exampleRadios2" value="J" <?php if(isset($cliente) && $cliente['tppessoa'] == "J") { echo "checked"; } ?>>
              <label class="form-check-label" for="exampleRadios2">
                Jurídica
              </label>
            </div>
            <?= form_error("tppessoa") ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="rua"><strong>Endereço</strong></label>
            <input type="text" name="rua" class="form-control" id="rua" placeholder="Rua do Cliente" value="<?php if(isset($cliente)) { echo $cliente['rua']; } ?>">
            <?= form_error("rua") ?>
          </div>
          <div class="form-group col-sm-1">
            <label for="numero"><strong>Número</strong></label>
            <input type="text" name="numero" class="form-control" id="numero" placeholder="100" value="<?php if(isset($cliente)) { echo $cliente['numero']; } ?>">
            <?= form_error("numero") ?>
          </div>
          <div class="form-group col-md-3">
            <label for="complemento"><strong>Complemento</strong></label>
            <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Rua sem Saída" value="<?php if(isset($cliente)) { echo $cliente['complemento']; } ?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="bairro"><strong>Bairro</strong></label>
            <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Centro" value="<?php if(isset($cliente)) { echo $cliente['bairro']; } ?>">
            <?= form_error("bairro") ?>
          </div>
          <div class="form-group col-md-2">
            <label for="cep"><strong>CEP</strong></label>
            <input type="text" name="cep" class="form-control" id="cep" placeholder="89150-000" value="<?php if(isset($cliente)) { echo $cliente['cep']; } ?>">
            <?= form_error("cep") ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="cidade"><strong>Cidade</strong></label>
            <input type="text" name="cidade" class="form-control" id="cidade" placeholder="São Paulo" value="<?php if(isset($cliente)) { echo $cliente['cidade']; } ?>">
            <?= form_error("cidade") ?>
          </div>
          <div class="form-group col-md-3">
            <label for="estado"><strong>Estado</strong></label>
            <select id="estado" name="estado" class="form-control">
              <option selected></option>
              <option value="AC" <?php if(isset($cliente) && $cliente['estado'] == "AC") { echo "selected"; } ?>>Acre</option>
              <option value="AL" <?php if(isset($cliente) && $cliente['estado'] == "AL") { echo "selected"; } ?>>Alagoas</option>
              <option value="AP" <?php if(isset($cliente) && $cliente['estado'] == "AP") { echo "selected"; } ?>>Amapá</option>
              <option value="AM" <?php if(isset($cliente) && $cliente['estado'] == "AM") { echo "selected"; } ?>>Amazonas</option>
              <option value="BA" <?php if(isset($cliente) && $cliente['estado'] == "BA") { echo "selected"; } ?>>Bahia</option>
              <option value="CE" <?php if(isset($cliente) && $cliente['estado'] == "CE") { echo "selected"; } ?>>Ceará</option>
              <option value="DF" <?php if(isset($cliente) && $cliente['estado'] == "DF") { echo "selected"; } ?>>Distrito Federal</option>
              <option value="ES" <?php if(isset($cliente) && $cliente['estado'] == "ES") { echo "selected"; } ?>>Espírito Santo</option>
              <option value="GO" <?php if(isset($cliente) && $cliente['estado'] == "GO") { echo "selected"; } ?>>Goiás</option>
              <option value="MA" <?php if(isset($cliente) && $cliente['estado'] == "MA") { echo "selected"; } ?>>Maranhão</option>
              <option value="MT" <?php if(isset($cliente) && $cliente['estado'] == "MT") { echo "selected"; } ?>>Mato Grosso</option>
              <option value="MS" <?php if(isset($cliente) && $cliente['estado'] == "MS") { echo "selected"; } ?>>Mato Grosso do Sul</option>
              <option value="MG" <?php if(isset($cliente) && $cliente['estado'] == "MG") { echo "selected"; } ?>>Minas Gerais</option>
              <option value="PA" <?php if(isset($cliente) && $cliente['estado'] == "PA") { echo "selected"; } ?>>Pará</option>
              <option value="PB" <?php if(isset($cliente) && $cliente['estado'] == "PB") { echo "selected"; } ?>>Paraíba</option>
              <option value="PR" <?php if(isset($cliente) && $cliente['estado'] == "PR") { echo "selected"; } ?>>Paraná</option>
              <option value="PE" <?php if(isset($cliente) && $cliente['estado'] == "PE") { echo "selected"; } ?>>Pernambuco</option>
              <option value="PI" <?php if(isset($cliente) && $cliente['estado'] == "PI") { echo "selected"; } ?>>Piauí</option>
              <option value="RJ" <?php if(isset($cliente) && $cliente['estado'] == "RJ") { echo "selected"; } ?>>Rio de Janeiro</option>
              <option value="RN" <?php if(isset($cliente) && $cliente['estado'] == "RN") { echo "selected"; } ?>>Rio Grande do Norte</option>
              <option value="RS" <?php if(isset($cliente) && $cliente['estado'] == "RS") { echo "selected"; } ?>>Rio Grande do Sul</option>
              <option value="RO" <?php if(isset($cliente) && $cliente['estado'] == "RO") { echo "selected"; } ?>>Rondônia</option>
              <option value="RR" <?php if(isset($cliente) && $cliente['estado'] == "RR") { echo "selected"; } ?>>Roraima</option>
              <option value="SC" <?php if(isset($cliente) && $cliente['estado'] == "SC") { echo "selected"; } ?>>Santa Catarina</option>
              <option value="SP" <?php if(isset($cliente) && $cliente['estado'] == "SP") { echo "selected"; } ?>>São Paulo</option>
              <option value="SE" <?php if(isset($cliente) && $cliente['estado'] == "SE") { echo "selected"; } ?>>Sergipe</option>
              <option value="TO" <?php if(isset($cliente) && $cliente['estado'] == "TO") { echo "selected"; } ?>>Tocantins</option>
            </select>
            <?= form_error("estado") ?>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="datanascimento"><strong>Data de Nascimento</strong></label>
            <input type="text" name="datanascimento" class="form-control" id="datanascimento" placeholder="Informe a Data de Nascimento" value="<?php if(isset($cliente)) { echo dataPostgresParaPtBr($cliente['datanascimento']); } ?>">
            <?= form_error("datanascimento") ?>
          </div>
          <div class="form-group col-md-3">
            <label for="profissao"><strong>Profissão</strong></label>
            <input type="text" name="profissao" class="form-control" id="profissao" placeholder="Informe a Profissão" value="<?php if(isset($cliente)) { echo $cliente['profissao']; } ?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="telefone"><strong>Telefone</strong></label>
            <input type="text" name="telefone" class="form-control" id="telefone" placeholder="Informe o Telefone" value="<?php if(isset($cliente)) { echo $cliente['telefone']; } ?>">
          </div>
          <div class="form-group col-md-3">
            <label for="celular"><strong>Celular</strong></label>
            <input type="text" name="celular" class="form-control" id="celular" placeholder="Informe o Celular" value="<?php if(isset($cliente)) { echo $cliente['celular']; } ?>">
            <?= form_error("celular") ?>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="email"><strong>E-mail</strong></label>
            <input type="text" name="email" class="form-control" id="email" placeholder="Informe o E-mail" value="<?php if(isset($cliente)) { echo $cliente['email']; } ?>">
          </div>
        </div>

        <button type="submit" class="btn btn-success">Gravar</button>
        <button id="limpar" type="button" class="btn btn-primary">Limpar Campos</button>
        <a href="<?= base_url("index.php/clientes") ?>" class="btn btn-danger">Voltar</a>
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