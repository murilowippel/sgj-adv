<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Contratos extends CI_Controller {

  //Função para abrir a listagem de contratos dos clientes
  public function index() {
    autoriza();
    $dados['titulopagina'] = "Contratos";
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('contratos/contratos.php');
    $this->load->view('rodape.php');
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();
    $dados['titulopagina'] = "Cadastro de Contrato";
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('contratos/novo.php');
    $this->load->view('rodape.php');
  }

}
