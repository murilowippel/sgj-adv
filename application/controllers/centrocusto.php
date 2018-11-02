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

    $this->load->template('financeiro/centrocusto.php', $dados);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();
    $dados['titulopagina'] = "Cadastro de Centros de Custo";
    $this->load->template('financeiro/formulariocentrocusto.php', $dados);
  }

}
