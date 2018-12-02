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

    //Carrega a lista de documentos
    $this->load->model("documento_model");
    $documentos['documentos'] = $this->documento_model->buscaTodos();

    //Carrega a view
    $this->load->template('ged/ged.php', $dados, $documentos);
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

  //Função para abrir editar um documento
  public function editar($iddocumento) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Documento";

    //Carregar registro pelo id
    $this->load->model("documento_model");
    $documento['documento'] = $this->documento_model->buscaDocumento($iddocumento);

    //Carrega a view
    $this->load->template('ged/formulario.php', $dados, $documento);
  }

  //Função para excluir um documento
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("documento_model");

    //Carregar id e apagar registro com o id
    $iddocumento = $this->input->get('iddocumento');

    $documento = $this->documento_model->buscaDocumento($iddocumento);
    //Apagando um arquivo possível arquivo já existente
    unlink("./files/documentos/" . $documento['nmarquivo'] . "." . $documento['extarquivo']);
    $this->documento_model->deleta($iddocumento);
    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Documento excluído com sucesso!");
    redirect("/ged");
  }
  
  public function gravar() {
    //Valida a sessão
    autoriza();

    //Carregando o Model
    $this->load->model("documento_model");

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Documento";

    $this->form_validation->set_rules("nome", "título", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    //Executa validações
    $sucesso = $this->form_validation->run();

    if ($sucesso) {
      //Nome+extensão
      $file = $_FILES["nmarquivo"]["name"];
      $nmarquivo = "";
      $extarquivo = "";

      //Se for enviado um arquivo para upload
      if ($file != "") {
        //nome do arquivo
        $nmarquivo = removeAcentos(str_replace(' ', '_', $this->input->post("nome") . "-" . pathinfo($file, PATHINFO_FILENAME)));
        
        //extensão do arquivo
        $extarquivo = pathinfo($file, PATHINFO_EXTENSION);

        $resultupload = "";

        $config = array();
        $path = './files/documentos/';
        $config['upload_path'] = $path;
        $config['allowed_types'] = "docx|doc|pdf";
        $config['max_size'] = '15000000';
        $config['file_name'] = $nmarquivo;

        $this->load->library('upload');

        $this->upload->initialize($config);

        if (!is_dir($path)) {
          @mkdir($path, 0777, true);
        }

        if (!$this->upload->do_upload('nmarquivo')) {
          throw new Exception($this->upload->display_errors());
        } else {
          $resultupload = "ok";
          $this->upload->data();
        }
      }

      //Carrega iddocumento (se não houver é nulo)
      $iddocumento = $this->input->post("iddocumento");

      //Verificando se é incluir ou editar
      if ($iddocumento) {
        //Buscar nome do arquivo e extensão caso não for upado um arquivo na edição
        $documento1 = $this->documento_model->buscaDocumento($iddocumento);

        if ($nmarquivo == "") {
          $nmarquivo = $documento1['nmarquivo'];
          $extarquivo = $documento1['extarquivo'];
        } else {
          //Apagando um arquivo possível arquivo já existente
          unlink("./files/documentos/" . $documento1['nmarquivo'] . "." . $documento1['extarquivo']);
        }

        //Carrega os valores dos campos do formulário
        $documento = array(
          "nome" => $this->input->post("nome"),
          "idusuariocriador" => $this->session->userdata['usuario_logado']['idusuario'],
          "datacadastro" => date('d-m-Y'),
          "nmarquivo" => $nmarquivo,
          "extarquivo" => $extarquivo
        );

        $this->documento_model->salvaEditado($documento, $iddocumento);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de iddocumento
        $query = $this->db->query("SELECT nextval('shcliente.sqiddocumento')");
        $iddocumento = $query->row_array();

        //Carrega os valores dos campos do formulário
        $documento = array(
          "iddocumento" => $iddocumento['nextval'],
          "nome" => $this->input->post("nome"),
          "idusuariocriador" => $this->session->userdata['usuario_logado']['idusuario'],
          "datacadastro" => date('d-m-Y'),
          "nmarquivo" => $nmarquivo,
          "extarquivo" => $extarquivo
        );

        $this->documento_model->salva($documento);
        $this->session->set_flashdata("success", "Documento gravado com sucesso!");
      }

      redirect("/ged");
    } else {
      $this->load->template("documentos/formulario.php", $dados);
    }
  }

  // Método que fará o download do arquivo
  public function download() {
    // recuperamos o terceiro segmento da url, que é o nome do arquivo
    $arquivo = $this->uri->segment(3);

    // definimos original path do arquivo
    $arquivoPath = './files/documentos/' . $arquivo;

    // forçamos o download no browser 
    // passando como parâmetro o path original do arquivo
    force_download($arquivoPath, null);
  }

}
