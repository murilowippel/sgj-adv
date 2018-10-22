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

    //Carrega a lista de Contratos
    $this->load->model("contrato_model");
    $contratos['contratos'] = $this->contrato_model->buscaTodos();

    $this->load->template('contratos/contratos.php', $dados, $contratos);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Contrato";

    //Carrega a view
    $this->load->template('contratos/formulario.php', $dados);
  }

  public function gravar() {
    $config['upload_path'] = './files/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 100;
    $config['max_width'] = 1024;
    $config['max_height'] = 768;

    $this->load->library('upload', $config);
  }

}
