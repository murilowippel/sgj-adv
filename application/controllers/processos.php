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

    //Carregar id e apagar registro com o id
    $idprocesso = $this->input->get('idprocesso');
    $this->processo_model->deleta($idprocesso);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Processo excluído com sucesso!");
    redirect("/processos");
  }
  
  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Processo";
    
    $this->form_validation->set_rules("titulo","titulo","required");
    $this->form_validation->set_rules("valorhonorario","valorhonorario","required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
    
    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("processo_model");
      $idprocesso = $this->input->post("idprocesso");
      
      if ($idprocesso) {
        //Carrega os valores dos campos do formulário
        $processo = array(
            "idcliente" => $this->input->post("idcliente"),
            "titulo" => $this->input->post("titulo"),
            "numero" => $this->input->post("numero"),
            "descricao" => $this->input->post("descricao"),
            "dataabertura" => dataPtBrParaPostgres($this->input->post("dataabertura")),
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
            "numero" => $this->input->post("numero"),
            "descricao" => $this->input->post("descricao"),
            "dataabertura" => dataPtBrParaPostgres($this->input->post("dataabertura")),
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
