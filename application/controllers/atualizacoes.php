<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações de atualizações de processos
 */
class Atualizacoes extends CI_Controller {

  //Função para abrir a listagem de processos
  public function index($idprocesso) {
    autoriza();
    
    //Atribui o título da página
    $dados['titulopagina'] = "Atualizações de Processo";
    
    //Carrega a lista de processos
    $this->load->model("atualizacao_model");
    $atualizacoes['atualizacoes'] = $this->atualizacao_model->buscaTodosProcesso($idprocesso);
    $atualizacoes['idprocesso'] = $idprocesso;
    
    //Carregar registro pelo id
    $this->load->model("processo_model");
    $atualizacoes['processo'] = $this->processo_model->buscaProcesso($idprocesso);
    
    $this->load->template('processos/atualizacoes.php', $dados, $atualizacoes);
  }

  //Função para abrir a página inicial após logar
  public function novo($idprocesso) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Atualização de Processo";
    $informacoes['idprocesso'] = $idprocesso;

    //Carrega a view
    $this->load->template('processos/formularioatualizacao.php', $dados, $informacoes);
  }
  
  //Função para abrir editar um processo
  public function editar($idatualizacao) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Atualizações de Processo";

    //Carregar registro pelo id
    $this->load->model("atualizacao_model");
    $atualizacao = $this->atualizacao_model->buscaAtualizacaoProcesso($idatualizacao);
    $informacoes['atualizacaoprocesso'] = $atualizacao;
    
    //Buscar processo da atualizacao selecionada
    $idprocesso = $atualizacao['idprocesso'];
    $informacoes['idprocesso'] = $idprocesso;

    //Carrega a view
    $this->load->template('processos/formularioatualizacao.php', $dados, $informacoes);
  }
  
  //Função para excluir um processo
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("atualizacao_model");

    //Carregar id e apagar registro com o id
    $idatualizacaoprocesso = $this->input->get('idatualizacaoprocesso');
    $this->atualizacao_model->deleta($idatualizacaoprocesso);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Atualização de Processo excluído com sucesso!");
    redirect("/processos");
  }
  
  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Atualizações de Processo";

    $this->form_validation->set_rules("titulo", "título", "required");
    $this->form_validation->set_rules("dataatualizacao", "data de atualização", "required");
    $this->form_validation->set_rules("descricao", "descrição", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    $idprocesso = $this->input->post("idprocesso");
    
    if ($sucesso) {
      $this->load->model("atualizacao_model");
      
      $idatualizacaoprocesso = $this->input->post("idatualizacaoprocesso");
      
      if ($idatualizacaoprocesso) {
        //Carrega os valores dos campos do formulário
        $atualizacao = array(
            "idprocesso" => $this->input->post("idprocesso"),
            "titulo" => $this->input->post("titulo"),
            "dataatualizacao" => $this->input->post("dataatualizacao"),
            "descricao" => $this->input->post("descricao"),
            "nmarquivo" => ""
        );

        $this->atualizacao_model->salvaEditado($atualizacao, $idatualizacaoprocesso);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idtipocontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidatualizacaoprocesso')");
        $idatualizacaoprocesso = $query->row_array();
        
        //Carrega os valores dos campos do formulário
        $atualizacao = array(
            "idatualizacaoprocesso" => $idatualizacaoprocesso['nextval'],
            "idprocesso" => $this->input->post("idprocesso"),
            "titulo" => $this->input->post("titulo"),
            "dataatualizacao" => $this->input->post("dataatualizacao"),
            "descricao" => $this->input->post("descricao"),
            "nmarquivo" => ""
        );

        $this->atualizacao_model->salva($atualizacao);
        $this->session->set_flashdata("success", "Atualização de Processo gravada com sucesso!");
      }

      redirect("/atualizacoes/".$idprocesso);
    } else {
      $atualizacoes['idprocesso'] = $idprocesso;
      $this->load->template("processos/formularioatualizacao.php", $dados, $atualizacoes);
    }
  }

}
