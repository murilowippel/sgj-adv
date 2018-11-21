<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações de manutenção de clientes
 */
class Clientes extends CI_Controller {

  //Função para abrir a listagem de clientes
  public function index() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Clientes";

    //Carrega a lista de clientes
    $this->load->model("cliente_model");
    $clientes['clientes'] = $this->cliente_model->buscaTodos();

    //Carrega a view
    $this->load->template('clientes/clientes.php', $dados, $clientes);
  }

  //Função para abrir o formulário de cadastro de clientes
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Cliente";

    //Carrega a view
    $this->load->template('clientes/formulario.php', $dados);
  }

  //Função para abrir editar um cliente
  public function editar($idcliente) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Cliente";

    //Carregar registro pelo id
    $this->load->model("cliente_model");
    $cliente['cliente'] = $this->cliente_model->buscaCliente($idcliente);

    //Carrega a view
    $this->load->template('clientes/formulario.php', $dados, $cliente);
  }

  //Função para excluir um cliente
  public function deletar() {
    //Valida a sessão
    autoriza();

    //Carregar id e apagar registro com o id
    $idcliente = $this->input->get('idcliente');
    $this->load->model("cliente_model");
    $this->cliente_model->deleta($idcliente);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Cliente excluído com sucesso!");
    redirect("/clientes");
  }

  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Cliente";
    
    $this->form_validation->set_rules("nome","nome","required");
    $this->form_validation->set_rules("cpfcnpj","cpf/cnpj","required");
    $this->form_validation->set_rules("tppessoa","tipo de pessoa","required");
    $this->form_validation->set_rules("rua","rua","required");
    $this->form_validation->set_rules("numero","numero","required");
    $this->form_validation->set_rules("bairro","bairro","required");
    $this->form_validation->set_rules("cidade","cidade","required");
    $this->form_validation->set_rules("estado","estado","required");
    $this->form_validation->set_rules("celular","celular","required");
    $this->form_validation->set_rules("datanascimento","data de nasc.","required");
    $this->form_validation->set_rules("cep","cep","required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
    
    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("cliente_model");
      $idcliente = $this->input->post("idcliente");

      if ($idcliente) {
        //Carrega os valores dos campos do formulário
        $cliente = array(
            "nome" => $this->input->post("nome"),
            "cpfcnpj" => $this->input->post("cpfcnpj"),
            "tppessoa" => $this->input->post("tppessoa"),
            "rua" => $this->input->post("rua"),
            "numero" => $this->input->post("numero"),
            "complemento" => $this->input->post("complemento"),
            "bairro" => $this->input->post("bairro"),
            "cidade" => $this->input->post("cidade"),
            "estado" => $this->input->post("estado"),
            "telefone" => $this->input->post("telefone"),
            "celular" => $this->input->post("celular"),
            "datanascimento" => dataPtBrParaPostgres($this->input->post("datanascimento")),
            "profissao" => $this->input->post("profissao"),
            "email" => $this->input->post("email"),
            "cep" => $this->input->post("cep")
        );

        $this->cliente_model->salvaEditado($cliente, $idcliente);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idcliente
        $query = $this->db->query("SELECT nextval('shcliente.sqidcliente')");
        $idcliente = $query->row_array();
        //Carrega os valores dos campos do formulário
        $cliente = array(
            "idcliente" => $idcliente['nextval'],
            "nome" => $this->input->post("nome"),
            "cpfcnpj" => $this->input->post("cpfcnpj"),
            "tppessoa" => $this->input->post("tppessoa"),
            "rua" => $this->input->post("rua"),
            "numero" => $this->input->post("numero"),
            "complemento" => $this->input->post("complemento"),
            "bairro" => $this->input->post("bairro"),
            "cidade" => $this->input->post("cidade"),
            "estado" => $this->input->post("estado"),
            "telefone" => $this->input->post("telefone"),
            "celular" => $this->input->post("celular"),
            "datanascimento" => dataPtBrParaPostgres($this->input->post("datanascimento")),
            "profissao" => $this->input->post("profissao"),
            "email" => $this->input->post("email"),
            "cep" => $this->input->post("cep")
        );
        
        $this->cliente_model->salva($cliente);
        $this->session->set_flashdata("success", "Cliente gravado com sucesso!");
      }

      redirect("/clientes");
    } else {
      $this->load->template("clientes/formulario.php", $dados);
    }
  }

}
