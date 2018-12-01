<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Contratos extends CI_Controller {

  //Função para abrir a listagem de contratos dos contratos
  public function index() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Contratos";

    //Carrega a lista de contratos
    $this->load->model("contrato_model");
    $contratos['contratos'] = $this->contrato_model->buscaTodos();
    
    //Carregando o model de cliente e tipo de contrato
    $this->load->model("cliente_model");
    $this->load->model("tipocontrato_model");

    //Carrega a view
    $this->load->template('contratos/contratos.php', $dados, $contratos);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Contrato";
    
    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();
    
    //Carregar os tipos de contrato
    $this->load->model("tipocontrato_model");
    $informacoes['tipocontratos'] = $this->tipocontrato_model->buscaTodos();
    
    //Carrega a view
    $this->load->template('contratos/formulario.php', $dados, $informacoes);
  }

  //Função para abrir editar um contrato
  public function editar($idcontrato) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Contrato";

    //Carregar registro pelo id
    $this->load->model("contrato_model");
    $informacoes['contrato'] = $this->contrato_model->buscaContrato($idcontrato);
    
    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();
    
    //Carregar os tipos de contrato
    $this->load->model("tipocontrato_model");
    $informacoes['tipocontratos'] = $this->tipocontrato_model->buscaTodos();

    //Carrega a view
    $this->load->template('contratos/formulario.php', $dados, $informacoes);
  }

  //Função para excluir um contrato
  public function deletar() {
    //Valida a sessão
    autoriza();

    //Carregar id e apagar registro com o id
    $idcontrato = $this->input->get('idcontrato');
    $this->load->model("contrato_model");
    $this->contrato_model->deleta($idcontrato);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Contrato excluído com sucesso!");
    redirect("/contratos");
  }
  
  public function gravar() {
    //Valida a sessão
    autoriza();
    
    //Carregando o Model
    $this->load->model("contrato_model");
    
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Contrato";
    
    $this->form_validation->set_rules("idcliente","cliente","required");
    $this->form_validation->set_rules("idtipocontrato","tipo de contrato","required");
    $this->form_validation->set_rules("titulo","título","required");
    $this->form_validation->set_rules("descricao","descrição","required");
    $this->form_validation->set_rules("datainiciovigencia","data de início","required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>","</p>");
    
    //Valida se o campo de fim de vigência possui algum valor, senão atribui null
    if($this->input->post("datafimvigencia") == ""){
      $datafim = NULL;
    } else {
      $datafim = $this->input->post("datafimvigencia");
    }
    
    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $idcontrato = $this->input->post("idcontrato");
      
      //Montando o nome do arquivo - Título do Arquivo + Nome do Cliente
      $this->load->model("cliente_model");
      $cliente = $this->cliente_model->buscaCliente($this->input->post("idcliente"));
      $nmarquivo = removeAcentos(str_replace(' ', '_', $this->input->post("titulo")." - ".$cliente['nome']));
      
      //UPLOAD DO ARQUIVO
      $resultupload = "";

      $config = array();
      $path = './files/contratos/';

      $config['upload_path'] = $path;
      $config['allowed_types'] = "docx|doc|pdf";
      $config['max_size']    = '15000000';
      $config['file_name'] = $nmarquivo;
      
      $filename= $_FILES["nmarquivo"]["name"];
      $extarquivo = pathinfo($filename,PATHINFO_EXTENSION);
      
      //Apagando um arquivo possível arquivo já existente
      unlink("./files/contratos/".$nmarquivo.".".$extarquivo);
      
      $this->load->library('upload');

      $this->upload->initialize($config);

      if(!is_dir($path)){
         @mkdir($path, 0777, true);
      }

      if ( ! $this->upload->do_upload('nmarquivo')) {
         throw new Exception($this->upload->display_errors());
      } else {
        $resultupload = "ok";  
        $this->upload->data();
      }
      
      //Verificando se é incluir ou editar
      if ($idcontrato) {
        //Carrega os valores dos campos do formulário
        $contrato = array(
            "idcliente" => $this->input->post("idcliente"),
            "idtipocontrato" => $this->input->post("idtipocontrato"),
            "titulo" => $this->input->post("titulo"),
            "descricao" => $this->input->post("descricao"),
            "nmarquivo" => $nmarquivo,
            "extarquivo" => $extarquivo,
            "datainiciovigencia" => $this->input->post("datainiciovigencia"),
            "datafimvigencia" => $datafim
        );

        $this->contrato_model->salvaEditado($contrato, $idcontrato);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idcontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidcontrato')");
        $idcontrato = $query->row_array();
        //Carrega os valores dos campos do formulário
        $contrato = array(
            "idcontrato" => $idcontrato['nextval'],
            "idcliente" => $this->input->post("idcliente"),
            "idtipocontrato" => $this->input->post("idtipocontrato"),
            "titulo" => $this->input->post("titulo"),
            "descricao" => $this->input->post("descricao"),
            "nmarquivo" => $nmarquivo,
            "extarquivo" => $extarquivo,
            "datainiciovigencia" => $this->input->post("datainiciovigencia"),
            "datafimvigencia" => $datafim
        );
        
        $this->contrato_model->salva($contrato);
        $this->session->set_flashdata("success", "Contrato gravado com sucesso!");
      }

      redirect("/contratos");
    } else {
      $this->load->template("contratos/formulario.php", $dados);
    }
  }
  
  
  // Método que fará o download do arquivo
  public function download(){
    // recuperamos o terceiro segmento da url, que é o nome do arquivo
    $arquivo = $this->uri->segment(3);
    
    // definimos original path do arquivo
    $arquivoPath = './files/contratos/'.$arquivo;
    
    // forçamos o download no browser 
    // passando como parâmetro o path original do arquivo
    force_download($arquivoPath,null);
  }

}
