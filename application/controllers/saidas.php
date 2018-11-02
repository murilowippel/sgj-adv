<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Saidas extends CI_Controller {

  //Função para abrir a listagem de centros de custo
  public function index() {
    autoriza();

    $dados['titulopagina'] = "Saídas - Entradas";

    $this->load->template('financeiro/saidas.php', $dados);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();
    $dados['titulopagina'] = "Cadastro de Saidas";
    $this->load->template('financeiro/formulariosaidas.php', $dados);
  }

}
