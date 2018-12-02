<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class CentroCusto extends CI_Controller {

  //Função para abrir a listagem de centros de custo
  public function index() {
    autoriza();

    $dados['titulopagina'] = "Centros de Custo";

    //Carrega a lista de Centros de Custos
    $this->load->model("centrocusto_model");
    $centrocustos['centrocustos'] = $this->centrocusto_model->buscaTodos();

    $this->load->template('financeiro/centrocusto.php', $dados, $centrocustos);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();

    $dados['titulopagina'] = "Cadastro de Centros de Custo";

    $this->load->template('financeiro/formulariocentrocusto.php', $dados);
  }

  //Função para abrir editar um centro de custo
  public function editar($idcentrocusto) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Centros de Custo";

    //Carregar registro pelo id
    $this->load->model("centrocusto_model");
    $centrocusto['centrocusto'] = $this->centrocusto_model->buscaCentroCusto($idcentrocusto);

    //Carrega a view
    $this->load->template('financeiro/formulariocentrocusto.php', $dados, $centrocusto);
  }

  //Função para excluir um processo
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("centrocusto_model");
    $this->load->model("saida_model");
    $this->load->model("entrada_model");

    //Carregar id e apagar registro com o id
    $idcentrocusto = $this->input->get('idcentrocusto');

    //Variável para controle de fluxo
    $resultado = "";

    //Verificar se possui algum contrato com o IDCLIENTE
    $saidas = $this->saida_model->buscaSaidaCentroCusto($idcentrocusto);
    if (is_array($saidas) && count($saidas) > 0) {
      $this->session->set_flashdata("danger", "O centro de custo selecionado possui saídas cadastradas!");
      //Redirecionando pra listagem
      redirect("/centrocusto");
    } else {
      $resultado = "ok";
    }

    //Verificar se possui algum contrato com o IDCLIENTE
    $entrada = $this->entrada_model->buscaEntradaCentroCusto($idcentrocusto);
    if (is_array($entrada) && count($entrada) > 0) {
      $this->session->set_flashdata("danger", "O centro de custo selecionado possui entradas cadastradas!");
      //Redirecionando pra listagem
      redirect("/centrocusto");
    } else {
      $resultado = "ok";
    }

    if ($resultado == "ok") {
      //Mensagem de sucesso e redirecionar
      $this->centrocusto_model->deleta($idcentrocusto);
      $this->session->set_flashdata("success", "Centro de Custo excluído com sucesso!");
      redirect("/centrocusto");
    }
  }

  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Centros de Custo";

    $this->form_validation->set_rules("nome", "nome", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("centrocusto_model");
      $idcentrocusto = $this->input->post("idcentrocusto");

      if ($idcentrocusto) {
        //Carrega os valores dos campos do formulário
        $centrocusto = array(
          "nome" => $this->input->post("nome"),
        );

        $this->centrocusto_model->salvaEditado($centrocusto, $idcentrocusto);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idcentrocusto
        $query = $this->db->query("SELECT nextval('shcliente.sqidcentrocusto')");
        $idcentrocusto = $query->row_array();
        //Carrega os valores dos campos do formulário
        $centrocusto = array(
          "idcentrocusto" => $idcentrocusto['nextval'],
          "nome" => $this->input->post("nome")
        );

        $this->centrocusto_model->salva($centrocusto);
        $this->session->set_flashdata("success", "Centro de Custos gravado com sucesso!");
      }

      redirect("/centrocusto");
    } else {
      $this->load->template("financeiro/formulariocentrocusto.php", $dados);
    }
  }

}
