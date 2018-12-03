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
  
  //Função para abrir o formulário de cadastro de clientes
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Usuário";

    //Carrega a view
    $this->load->template('usuarios/formulario.php', $dados);
  }
  
  //Função para abrir editar um tipo de contrato
  public function editar($idusuario) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Usuários";

    //Carregar registro pelo id
    $this->load->model("usuario_model");
    $usuario['usuario'] = $this->usuario_model->buscaUsuario($idusuario);

    //Carrega a view
    $this->load->template('usuarios/formulario.php', $dados, $usuario);
  }
  
  public function gravar() {
    //Valida a sessão
    autoriza();
    
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Usuários";
    
    $this->form_validation->set_rules("nome", "nome", "required");
    $this->form_validation->set_rules("email", "e-mail", "required");
    if($this->input->post("idusuario") == ""){
      $this->form_validation->set_rules("senha", "senha", "required");
    }
    $this->form_validation->set_rules("cpf", "cpf", "required");
    $this->form_validation->set_rules("nvlacesso", "tipo de usuário", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      //Carregando o model
      $this->load->model("usuario_model");
      
      //Carrega o idusuario se houver
      $idusuario = $this->input->post("idusuario");
      
      //Verifica se o acesso ao usuário está liberado SIM / NÃO
      if($this->input->post("liberado") == "on"){
        $liberado = '1';
      } else {
        $liberado = '0';
      }

      if ($idusuario) {
        $usuario1 = $this->usuario_model->buscaUsuario($idusuario);
        if($this->input->post("senha") == ""){
          $senha = $usuario1['senha'];
        } else {
          $senha = md5($this->input->post("senha"));
        }
        
        //Carrega os valores dos campos do formulário
        $usuario = array(
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => $senha,
            "cpf" => $this->input->post("cpf"),
            "nvlacesso" => $this->input->post("nvlacesso"),
            "liberado" => $liberado,
        );
        
        $this->usuario_model->salvaEditado($usuario, $idusuario);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idusuario
        $query = $this->db->query("SELECT nextval('shadmin.sqidusuario')");
        $idusuario = $query->row_array();
        //Carrega os valores dos campos do formulário
        $usuario = array(
            "idusuario" => $idusuario['nextval'],
            "nome" => $this->input->post("nome"),
            "email" => $this->input->post("email"),
            "senha" => md5($this->input->post("senha")),
            "cpf" => $this->input->post("cpf"),
            "nvlacesso" => $this->input->post("nvlacesso"),
            "liberado" => $liberado,
        );

        $this->usuario_model->salva($usuario);
        $this->session->set_flashdata("success", "Usuário criado com sucesso!");
      }

      redirect("/usuarios");
    } else {
      $this->load->template("usuarios/formulario.php", $dados);
    }
  }
  
  //Função para abrir o formulário de cadastro de clientes
  public function logacessos() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Registro de Acessos";

    //Carrega a view
    $this->load->template('usuarios/logacessos.php', $dados);
  }

}
