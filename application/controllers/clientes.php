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
    $clientes = $this->cliente_model->buscaTodos();
    $dados['clientes'] = $clientes;

    //Carrega a view
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('clientes/clientes.php');
    $this->load->view('rodape.php');
  }

  //Função para abrir o formulário de cadastro de clientes
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Cliente";

    //Carrega a view
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('clientes/novo.php');
    $this->load->view('rodape.php');
  }

  //Função para abrir o formulário de cadastro de clientes
  public function editar() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Cliente";

    //Carregar registro pelo id
    $idcliente = $this->input->get('idcliente');
    $this->load->model("cliente_model");
    $cliente['cliente'] = $this->cliente_model->buscaCliente($idcliente);

    //Carrega a view
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('clientes/novo.php', $cliente);
    $this->load->view('rodape.php');
  }

  //Função para abrir o formulário de cadastro de clientes
  public function deleta() {
    //Valida a sessão
    autoriza();

    $idcliente = $this->input->get('idcliente');
    $this->load->model("cliente_model");
    $this->cliente_model->deleta($idcliente);

    $this->session->set_flashdata("success", "Cliente apagado com sucesso");
    redirect("/clientes");
  }

  public function gravar() {
    //Valida a sessão
    autoriza();

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
      $this->session->set_flashdata("success", "Dados atualizados com sucesso");
      
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
      $this->session->set_flashdata("success", "Cliente gravado com sucesso");
    }

    redirect("/clientes");
  }

}
