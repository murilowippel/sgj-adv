<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da de processos
 */
class Processos extends CI_Controller {

  //Função para abrir a listagem de processos
  public function index() {
    autoriza();
    
    //Atribui o título da página
    $dados['titulopagina'] = "Processos";
    
    //Carrega a lista de processos
    $this->load->model("processo_model");
    $processos['processos'] = $this->processo_model->buscaTodos();

    //Carregando o model de clientes
    $this->load->model("cliente_model");
    
    $this->load->template('processos/processos.php', $dados, $processos);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Processo";

    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();

    //Carregar os contratos
    $this->load->model("contrato_model");
    $informacoes['contratos'] = $this->contrato_model->buscaTodos();

    //Carrega a view
    $this->load->template('processos/formulario.php', $dados, $informacoes);
  }
  
  //Função para abrir editar um processo
  public function editar($idprocesso) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Processo";

    //Carregar registro pelo id
    $this->load->model("processo_model");
    $informacoes['processo'] = $this->processo_model->buscaProcesso($idprocesso);

    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();

    //Carregar os contratos
    $this->load->model("contrato_model");
    $informacoes['contratos'] = $this->contrato_model->buscaTodos();

    //Carrega a view
    $this->load->template('processos/formulario.php', $dados, $informacoes);
  }
  
  //Função para excluir um processo
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("processo_model");
    $this->load->model("atualizacao_model");

    //Carregar id e apagar registro com o id
    $idprocesso = $this->input->get('idprocesso');
    
    //Variável para controle de fluxo
    $resultado = "";
    
    //Verificar se possui alguma atualização com o IDPROCESSO
    $atualizacoes = $this->atualizacao_model->buscaTodosProcesso($idprocesso);
    
    if(is_array($atualizacoes) && count($atualizacoes) > 0){
      $this->session->set_flashdata("danger", "O processo selecionado possui atualizações cadastrados!");
    } else {
      $resultado = "ok";
    }
    
    if($resultado == "ok"){
      //Apagando o registro
      $this->processo_model->deleta($idprocesso);
      //Mensagem de sucesso
      $this->session->set_flashdata("success", "Processo excluído com sucesso!");
    }
    
    redirect("/processos");
  }
  
  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Processo";
    
    $this->form_validation->set_rules("titulo","titulo","required");
    $this->form_validation->set_rules("valorhonorario","valorhonorario","required");
    $this->form_validation->set_rules("idcontrato", "contrato", "required");
    $this->form_validation->set_rules("idcliente", "cliente", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
    
    //Valida se o campo de data de abertura e numero possui algum valor, senão atribui null
    if ($this->input->post("dataabertura") == "") {
      $dataabertura = NULL;
    } else {
      $dataabertura = $this->input->post("dataabertura");
    }
    
    if ($this->input->post("numero") == "") {
      $numero = NULL;
    } else {
      $numero = $this->input->post("numero");
    }
    
    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("processo_model");
      $idprocesso = $this->input->post("idprocesso");
      
      if ($idprocesso) {
        //Carrega os valores dos campos do formulário
        $processo = array(
            "idcliente" => $this->input->post("idcliente"),
            "titulo" => $this->input->post("titulo"),
            "numero" => $numero,
            "descricao" => $this->input->post("descricao"),
            "dataabertura" => $dataabertura,
            "valorhonorario" => $this->input->post("valorhonorario"),
            "idusuariocriador" => $this->session->userdata['usuario_logado']['idusuario'],
            "idcontrato" => $this->input->post("idcontrato")
        );

        $this->processo_model->salvaEditado($processo, $idprocesso);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idprocesso
        $query = $this->db->query("SELECT nextval('shcliente.sqidprocesso')");
        $idprocesso = $query->row_array();
        //Carrega os valores dos campos do formulário
        $processo = array(
            "idprocesso" => $idprocesso['nextval'],
            "idcliente" => $this->input->post("idcliente"),
            "titulo" => $this->input->post("titulo"),
            "numero" => $numero,
            "descricao" => $this->input->post("descricao"),
            "dataabertura" => $dataabertura,
            "valorhonorario" => $this->input->post("valorhonorario"),
            "idusuariocriador" => $this->session->userdata['usuario_logado']['idusuario'],
            "idcontrato" => $this->input->post("idcontrato")
        );
        
        $this->processo_model->salva($processo);
        $this->session->set_flashdata("success", "Processo gravado com sucesso!");
      }

      redirect("/processos");
    } else {
      $this->load->template("processos/formulario.php", $dados);
    }
  }

}
