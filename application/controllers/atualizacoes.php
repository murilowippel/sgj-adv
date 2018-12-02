<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações de atualizações de processos
 */
class Atualizacoes extends CI_Controller {

  //Função para abrir a listagem de processos
  public function index($idprocesso) {
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Atualizações de Processo";

    //Carrega a lista de processos
    $this->load->model("atualizacao_model");
    $atualizacoes['atualizacoes'] = $this->atualizacao_model->buscaTodosProcesso($idprocesso);
    $atualizacoes['idprocesso'] = $idprocesso;

    //Carregar registro pelo id
    $this->load->model("processo_model");
    $atualizacoes['processo'] = $this->processo_model->buscaProcesso($idprocesso);

    $this->load->template('processos/atualizacoes.php', $dados, $atualizacoes);
  }

  //Função para abrir a página inicial após logar
  public function novo($idprocesso) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Atualização de Processo";
    $informacoes['idprocesso'] = $idprocesso;

    //Carrega a view
    $this->load->template('processos/formularioatualizacao.php', $dados, $informacoes);
  }

  //Função para abrir editar um processo
  public function editar($idatualizacao) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Atualizações de Processo";

    //Carregar registro pelo id
    $this->load->model("atualizacao_model");
    $atualizacao = $this->atualizacao_model->buscaAtualizacaoProcesso($idatualizacao);
    $informacoes['atualizacaoprocesso'] = $atualizacao;

    //Buscar processo da atualizacao selecionada
    $idprocesso = $atualizacao['idprocesso'];
    $informacoes['idprocesso'] = $idprocesso;

    //Carrega a view
    $this->load->template('processos/formularioatualizacao.php', $dados, $informacoes);
  }

  //Função para excluir um processo
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("atualizacao_model");

    //Carregar id e apagar registro com o id
    $idatualizacaoprocesso = $this->input->get('idatualizacaoprocesso');

    //Apagando um arquivo possível arquivo já existente
    $atualizacao = $this->atualizacao_model->buscaAtualizacaoProcesso($idatualizacaoprocesso);

    $this->atualizacao_model->deleta($idatualizacaoprocesso);

    unlink("./files/atualizacoes/" . $atualizacao['nmarquivo'] . "." . $atualizacao['extarquivo']);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Atualização de Processo excluído com sucesso!");
    redirect("/processos");
  }

  public function gravar() {
    //Valida a sessão
    autoriza();

    $this->load->model("atualizacao_model");

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Atualizações de Processo";

    $this->form_validation->set_rules("titulo", "título", "required");
    $this->form_validation->set_rules("dataatualizacao", "data de atualização", "required");
    $this->form_validation->set_rules("descricao", "descrição", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    $idprocesso = $this->input->post("idprocesso");

    if ($sucesso) {
      //Nome+extensão
      $file = $_FILES["nmarquivo"]["name"];
      $nmarquivo = "";
      $extarquivo = "";

      if ($file != "") {

        //nome do arquivo
        $nmarquivo = removeAcentos(str_replace(' ', '_', pathinfo($file, PATHINFO_FILENAME)));

        //extensão do arquivo
        $extarquivo = pathinfo($file, PATHINFO_EXTENSION);

        $resultupload = "";

        $config = array();
        $path = './files/atualizacoes/';
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

      $idatualizacaoprocesso = $this->input->post("idatualizacaoprocesso");

      if ($idatualizacaoprocesso) {
        //Buscar nome do arquivo e extensão caso não for upado um arquivo na edição
        $atualizacaoprocesso1 = $this->atualizacao_model->buscaAtualizacaoProcesso($idatualizacaoprocesso);

        if ($nmarquivo == "") {
          $nmarquivo = $atualizacaoprocesso1['nmarquivo'];
          $extarquivo = $atualizacaoprocesso1['extarquivo'];
        } else {
          //Apagando um arquivo possível arquivo já existente
          unlink("./files/atualizacoes/" . $atualizacaoprocesso1['nmarquivo'] . "." . $atualizacaoprocesso1['extarquivo']);
        }

        //Carrega os valores dos campos do formulário
        $atualizacao = array(
          "idprocesso" => $this->input->post("idprocesso"),
          "titulo" => $this->input->post("titulo"),
          "dataatualizacao" => $this->input->post("dataatualizacao"),
          "descricao" => $this->input->post("descricao"),
          "nmarquivo" => $nmarquivo,
          "extarquivo" => $extarquivo
        );

        $this->atualizacao_model->salvaEditado($atualizacao, $idatualizacaoprocesso);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idtipocontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidatualizacaoprocesso')");
        $idatualizacaoprocesso = $query->row_array();

        //Carrega os valores dos campos do formulário
        $atualizacao = array(
          "idatualizacaoprocesso" => $idatualizacaoprocesso['nextval'],
          "idprocesso" => $this->input->post("idprocesso"),
          "titulo" => $this->input->post("titulo"),
          "dataatualizacao" => $this->input->post("dataatualizacao"),
          "descricao" => $this->input->post("descricao"),
          "nmarquivo" => $nmarquivo,
          "extarquivo" => $extarquivo
        );

        $this->atualizacao_model->salva($atualizacao);
        $this->session->set_flashdata("success", "Atualização de Processo gravada com sucesso!");
      }

      redirect("/atualizacoes/" . $idprocesso);
    } else {
      $atualizacoes['idprocesso'] = $idprocesso;
      $this->load->template("processos/formularioatualizacao.php", $dados, $atualizacoes);
    }
  }

  // Método que fará o download do arquivo
  public function download() {
    // recuperamos o terceiro segmento da url, que é o nome do arquivo
    $arquivo = $this->uri->segment(3);

    // definimos original path do arquivo
    $arquivoPath = './files/atualizacoes/' . $arquivo;

    // forçamos o download no browser 
    // passando como parâmetro o path original do arquivo
    force_download($arquivoPath, null);
  }

}
