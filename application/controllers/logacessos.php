<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class LogAcessos extends CI_Controller {

  //Função para abrir a listagem de log de acessos
  public function index() {
    autoriza();

    $dados['titulopagina'] = "Registro de Acessos";

    //Carrega a lista de Contratos
    $this->load->model("logacessos_model");
    $logacessos['logacessos'] = $this->logacessos_model->buscaTodos();

    //Carregar model de usuário
    $this->load->model("usuario_model");
    
    $this->load->template('usuarios/logacessos.php', $dados, $logacessos);
  }

}
