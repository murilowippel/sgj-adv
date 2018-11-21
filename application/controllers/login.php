<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Login extends CI_Controller {

  //Função para abrir a listagem de contratos dos clientes
  public function index() {
    $this->load->view('login/login.php');
  }
  
  //Função para abrir a página inicial após logar
  public function recuperar() {
    $this->load->view('login/esqueci-senha.php');
  }

  //Função para abrir a página inicial após logar
  public function autenticar() {
    $this->load->model("usuario_model");
    $this->load->model("logacessos_model");
    
    $email = $this->input->post("email");
    $senha = md5($this->input->post("senha"));
    
    $usuario = $this->usuario_model->buscaPorEmailESenha($email,$senha);
    if($usuario){
      $this->session->set_userdata("usuario_logado", $usuario);
      
      //Gravando o log de acesso
      $query = $this->db->query("SELECT nextval('shadmin.sqidlogacessos')");
      $idlogacessos = $query->row_array();
      //Carrega os valores dos campos do formulário
      $logacesso = array(
          "idlogacessos" => $idlogacessos['nextval'],
          "idusuario" => $usuario['idusuario'],
          "datahracesso" => date('Y-m-d H:i:s'),
          "ipusuario" => $_SERVER['REMOTE_ADDR']
      );

      $this->logacessos_model->salva($logacesso);
      
      redirect("/");
    } else {
      $dados = array("mensagem" => "E-mail ou senha incorretos");
      $this->load->view("login/login", $dados);
    }
  }
  
  //Função de Logout
  public function logout() {
    $this->session->unset_userdata("usuario_logado");
    $this->load->view("login/login");
  }
  
    //Função para abrir a listagem de contratos dos clientes
//  public function inserirnovo() {
//    
//    //gravar na tabela usuario:
//    //idusuario, nome, email, senha, cpf, nvlacesso, datacriacaousuario, liberado
//    $usuario = array(
//      "nome" => $this->input->post("nomecompleto"),
//      "email" => $this->input->post("email"),
//      "senha" => md5($this->input->post("senha")) 
//    );
//    
//    $this->load->model("Usuario");
//    $this->Usuarios->salva($usuario);
//    $this->load->view("login/login.php");
//  }
  
}
