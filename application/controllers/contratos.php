<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Contratos extends CI_Controller {

  //Função para abrir a listagem de contratos dos contratos
  public function index() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Contratos";

    //Carrega a lista de contratos
    $this->load->model("contrato_model");
    $contratos['contratos'] = $this->contrato_model->buscaTodos();
    
    //Carregando o model de cliente e tipo de contrato
    $this->load->model("cliente_model");
    $this->load->model("tipocontrato_model");

    //Carrega a view
    $this->load->template('contratos/contratos.php', $dados, $contratos);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Contrato";
    
    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();
    
    //Carregar os tipos de contrato
    $this->load->model("tipocontrato_model");
    $informacoes['tipocontratos'] = $this->tipocontrato_model->buscaTodos();
    
    //Carrega a view
    $this->load->template('contratos/formulario.php', $dados, $informacoes);
  }

  //Função para abrir editar um contrato
  public function editar($idcontrato) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Contrato";

    //Carregar registro pelo id
    $this->load->model("contrato_model");
    $informacoes['contrato'] = $this->contrato_model->buscaContrato($idcontrato);
    
    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();
    
    //Carregar os tipos de contrato
    $this->load->model("tipocontrato_model");
    $informacoes['tipocontratos'] = $this->tipocontrato_model->buscaTodos();

    //Carrega a view
    $this->load->template('contratos/formulario.php', $dados, $informacoes);
  }

  //Função para excluir um contrato
  public function deletar() {
    //Valida a sessão
    autoriza();

    //Carregar id e apagar registro com o id
    $idcontrato = $this->input->get('idcontrato');
    $this->load->model("contrato_model");
    $this->contrato_model->deleta($idcontrato);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Contrato excluído com sucesso!");
    redirect("/contratos");
  }
  
  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Contrato";
    
    $this->form_validation->set_rules("idcliente","cliente","required");
    $this->form_validation->set_rules("idtipocontrato","tipo de contrato","required");
    $this->form_validation->set_rules("titulo","título","required");
    $this->form_validation->set_rules("descricao","descrição","required");
    $this->form_validation->set_rules("datainiciovigencia","data de início","required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
    
    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("contrato_model");
      $idcontrato = $this->input->post("idcontrato");

      if ($idcontrato) {
        //Carrega os valores dos campos do formulário
        $contrato = array(
            "idcliente" => $this->input->post("idcliente"),
            "idtipocontrato" => $this->input->post("idtipocontrato"),
            "titulo" => $this->input->post("titulo"),
            "descricao" => $this->input->post("descricao"),
            "datainiciovigencia" => $this->input->post("datainiciovigencia"),
            "datafimvigencia" => $this->input->post("datafimvigencia")
        );

        $this->contrato_model->salvaEditado($contrato, $idcontrato);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idcontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidcontrato')");
        $idcontrato = $query->row_array();
        //Carrega os valores dos campos do formulário
        $contrato = array(
            "idcontrato" => $idcontrato['nextval'],
            "idcliente" => $this->input->post("idcliente"),
            "idtipocontrato" => $this->input->post("idtipocontrato"),
            "titulo" => $this->input->post("titulo"),
            "descricao" => $this->input->post("descricao"),
            "datainiciovigencia" => $this->input->post("datainiciovigencia"),
            "datafimvigencia" => $this->input->post("datafimvigencia")
        );
        
        $this->contrato_model->salva($contrato);
        $this->session->set_flashdata("success", "Contrato gravado com sucesso!");
      }

      redirect("/contratos");
    } else {
      $this->load->template("contratos/formulario.php", $dados);
    }
  }

}
