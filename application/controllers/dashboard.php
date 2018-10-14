<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Dashboard extends CI_Controller {

  //Função para abrir a página inicial após logar
  public function index() {
    autoriza();
    $dados['titulopagina'] = "Página Inicial";
    $this->load->view('cabecalho.php', $dados);
    $this->load->view('dashboard/dashboard.php');
    $this->load->view('rodape.php');
  }

}
