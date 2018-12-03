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

    //Carrega a lista de Contratos
    $this->load->model("agenda_model");
    $compromissos['compromissos'] = $this->agenda_model->buscaTodos();

    $this->load->template('agenda/agenda.php', $dados, $compromissos);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Evento";

    //Carregar os usuários
    $this->load->model("usuario_model");
    $informacoes['usuarios'] = $this->usuario_model->buscaTodos();

    //Carrega a view
    $this->load->template('agenda/formulario.php', $dados, $informacoes);
  }

  //Função para abrir editar um tipo de contrato
  public function editar($idcompromisso) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Compromissos";

    //Carregar registro pelo id
    $this->load->model("agenda_model");
    $compromisso['compromisso'] = $this->agenda_model->buscaCompromisso($idcompromisso);

    //Carregar os usuários
    $this->load->model("usuario_model");
    $compromisso['usuarios'] = $this->usuario_model->buscaTodos();

    //Carrega a view
    $this->load->template('agenda/formulario.php', $dados, $compromisso);
  }

  //Função para excluir um processo
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("agenda_model");

    //Carregar id e apagar registro com o id
    $idcompromisso = $this->input->get('idcompromisso');
    $this->agenda_model->deleta($idcompromisso);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Compromisso excluído com sucesso!");
    redirect("/agenda");
  }

  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Compromissos";

    $this->form_validation->set_rules("titulo", "título", "required");
    $this->form_validation->set_rules("descricao", "descrição", "required");
    $this->form_validation->set_rules("datacompromisso", "data", "required");
    $this->form_validation->set_rules("horariocompromisso", "horário", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("agenda_model");
      $idcompromisso = $this->input->post("idcompromisso");

      //Valida se o campo de fim de vigência possui algum valor, senão atribui null
      if ($this->input->post("datacompromisso") == "") {
        $datacompromisso = NULL;
      } else {
        $datacompromisso = $this->input->post("datacompromisso");
      }

      $usuariosrespo = $this->input->post("idusuarios");
      $usresp = "";
      $cont = "";
      foreach ($usuariosrespo as $key => $usuario) {
        $cont++;
        if ($cont != count($usuariosrespo)) {
          $usresp .= $usuario . ",";
        } else {
          $usresp .= $usuario;
        }
      }

      if ($idcompromisso) {
        //Carrega os valores dos campos do formulário
        $compromisso = array(
          "titulo" => $this->input->post("titulo"),
          "descricao" => $this->input->post("descricao"),
          "datacompromisso" => $datacompromisso,
          "horariocompromisso" => $this->input->post("horariocompromisso"),
          "local" => $this->input->post("local"),
          "idusuarioresponsavel" => $usresp
        );

        $this->agenda_model->salvaEditado($compromisso, $idcompromisso);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idtipocontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidcompromisso')");
        $idcompromisso = $query->row_array();
        //Carrega os valores dos campos do formulário
        $compromisso = array(
          "idcompromisso" => $idcompromisso['nextval'],
          "titulo" => $this->input->post("titulo"),
          "descricao" => $this->input->post("descricao"),
          "datacompromisso" => $datacompromisso,
          "horariocompromisso" => $this->input->post("horariocompromisso"),
          "local" => $this->input->post("local"),
          "idusuarioresponsavel" => $usresp
        );

        //Gerar notificação
        $notificados = explode(",", $usresp);
        
        foreach ($notificados as $key => $notificado) {
          $this->load->model("notificacao_model");
          $query = $this->db->query("SELECT nextval('shcliente.sqidnotificacao')");
          $idnotificacao = $query->row_array();
          //Carrega os valores dos campos do formulário
          $notificacao = array(
            "idnotificacao" => $idnotificacao['nextval'],
            "titulo" => "Você foi relacionado ao compromisso " . $this->input->post("titulo"),
            "dataenvio" => date('Y-m-d H:i:s'),
            "idusuariodestino" => $notificado
          );

          $this->notificacao_model->salva($notificacao);
          
          $this->load->model("usuario_model");
          $usuario = $this->usuario_model->BuscaUsuario($notificado);
          $mensagem = "Você tem um novo comproisso: ".$compromisso['titulo']. " no dia ".$datacompromisso.". Veja mais detalhes no sistema SGJ - Sistema de Gestão Jurídica";
          //Enviar e-mail
          $config["protocol"] = "smtp";
          $config["smtp_host"] = "ssl://smtp.gmail.com";
          $config["smtp_user"] = "noreplysisadv@gmail.com";
          $config["smtp_pass"] = "xico123#";
          $config["charset"] = "utf-8";
          $config["mailtype"] = "html";
          $config["newline"] = "\r\n";
          $config["smtp_port"] = "465";
          $this->email->initialize($config);
          
          $this->email->from("noreplysisadv@gmail", "SGJ - Sistema de Gestão Jurídica");
          $this->email->to($usuario['email']);
          $this->email->subject("Novo Compromisso - SGJ Sistema de Gestão Jurídica");
          $this->email->message($mensagem);
          
          $this->email->send();
        }

        $this->agenda_model->salva($compromisso);
        $this->session->set_flashdata("success", "Compromisso gravado com sucesso. Os usuários serão notificados por e-mail!");
      }

      redirect("/agenda");
    } else {
      $this->load->template("agenda/formulario.php", $dados);
    }
  }

}
