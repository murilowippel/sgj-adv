<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Agenda extends CI_Controller {

  //Função para abrir a listagem de contratos dos clientes
  public function index() {
    autoriza();

    $dados['titulopagina'] = "Agenda";

    $this->load->template('agenda/agenda.php', $dados);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Evento";

    //Carrega a view
    $this->load->template('agenda/formulario.php', $dados);
  }

}
