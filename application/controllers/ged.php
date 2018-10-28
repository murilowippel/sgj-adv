<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações de manutenção de usuários
 */
class Ged extends CI_Controller {

  //Função para abrir a listagem de usuários
  public function index() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "G.E.D";

    //Carrega a view
    $this->load->template('ged/ged.php', $dados);
  }
  
  //Função para abrir o formulário de cadastro de documentos
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Documento";

    //Carrega a view
    $this->load->template('ged/formulario.php', $dados);
  }

}
