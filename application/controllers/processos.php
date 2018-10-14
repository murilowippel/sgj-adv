<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Processos extends CI_Controller {

  //Função para abrir a listagem de processos
  public function index() {
    autoriza();
    $dados['titulopagina'] = "Processos";
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('processos/processos.php');
    $this->load->view('rodape.php');
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();
    $dados['titulopagina'] = "Cadastro de Processo";
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('processos/novo.php');
    $this->load->view('rodape.php');
  }

}
