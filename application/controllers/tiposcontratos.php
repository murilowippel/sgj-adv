<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class TiposContratos extends CI_Controller {

  //Função para abrir a listagem de contratos dos tipos de contratos
  public function index() {
    autoriza();

    $dados['titulopagina'] = "Tipos de Contrato";

    //Carrega a lista de Contratos
    $this->load->model("tipocontrato_model");
    $tiposcontratos['tiposcontratos'] = $this->tipocontrato_model->buscaTodos();

    $this->load->template('tiposcontratos/tiposcontratos.php', $dados, $tiposcontratos);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();
    $dados['titulopagina'] = "Cadastro de Tipos de Contrato";
    $this->load->template('tiposcontratos/formulario.php', $dados);
  }

  //Função para abrir editar um tipo de contrato
  public function editar($idtipocontrato) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Tipos de Contrato";

    //Carregar registro pelo id
    $this->load->model("tipocontrato_model");
    $tipocontrato['tipocontrato'] = $this->tipocontrato_model->buscaTipoContrato($idtipocontrato);

    //Carrega a view
    $this->load->template('tiposcontratos/formulario.php', $dados, $tipocontrato);
  }

  //Função para excluir um tipos de contratos
  public function deletar() {
    //Valida a sessão
    autoriza();

    //Carregar id e apagar registro com o id
    $idtipocontrato = $this->input->get('idtipocontrato');
    $this->load->model("tipocontrato_model");
    $this->tipocontrato_model->deleta($idtipocontrato);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Tipo de Contrato excluído com sucesso!");
    redirect("/tiposcontratos");
  }

  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Tipos de Contratos";

    $this->form_validation->set_rules("nome", "nome", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("tipocontrato_model");
      $idtipocontrato = $this->input->post("idtipocontrato");

      if ($idtipocontrato) {
        //Carrega os valores dos campos do formulário
        $tipocontrato = array(
            "nome" => $this->input->post("nome"),
        );

        $this->tipocontrato_model->salvaEditado($tipocontrato, $idtipocontrato);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idtipocontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidtipocontrato')");
        $idtipocontrato = $query->row_array();
        //Carrega os valores dos campos do formulário
        $tipocontrato = array(
            "idtipocontrato" => $idtipocontrato['nextval'],
            "nome" => $this->input->post("nome")
        );

        $this->tipocontrato_model->salva($tipocontrato);
        $this->session->set_flashdata("success", "Tipo de Contrato gravado com sucesso!");
      }

      redirect("/tiposcontratos");
    } else {
      $this->load->template("tiposcontratos/formulario.php", $dados);
    }
  }

}
