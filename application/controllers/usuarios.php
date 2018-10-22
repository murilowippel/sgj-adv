<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações de manutenção de usuários
 */
class Usuarios extends CI_Controller {

  //Função para abrir a listagem de usuários
  public function index() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Usuários";

    //Carrega a lista de Usuários
    $this->load->model("usuario_model");
    $usuarios = $this->usuario_model->buscaTodos();
    $usuarios['usuarios'] = $usuarios;

    //Carrega a view
    $this->load->template('usuarios/usuarios.php', $dados, $usuarios);
  }

}
