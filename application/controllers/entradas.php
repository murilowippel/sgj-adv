<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once("fpdf/fpdf.php");

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Entradas extends CI_Controller {

  //Função para abrir a listagem de centros de custo
  public function index() {
    autoriza();

    $dados['titulopagina'] = "Financeiro - Entradas";

    //Carrega a lista de entradas
    $this->load->model("entrada_model");
    $entradas['entradas'] = $this->entrada_model->buscaTodos();

    //Carregando o model de cliente e tipo de contrato
    $this->load->model("cliente_model");
    $this->load->model("centrocusto_model");

    $this->load->template('financeiro/entradas.php', $dados, $entradas);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();

    $dados['titulopagina'] = "Cadastro de Entradas";

    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();

    //Carregar os centros de custos
    $this->load->model("centrocusto_model");
    $informacoes['centrocustos'] = $this->centrocusto_model->buscaTodos();

    $this->load->template('financeiro/formularioentrada.php', $dados, $informacoes);
  }

  //Função para abrir editar um contrato
  public function editar($identrada) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Entrada";

    //Carregar registro pelo id
    $this->load->model("entrada_model");
    $informacoes['entrada'] = $this->entrada_model->buscaEntrada($identrada);

    //Carregar os clientes
    $this->load->model("cliente_model");
    $informacoes['clientes'] = $this->cliente_model->buscaTodos();

    //Carregar os centros de custos
    $this->load->model("centrocusto_model");
    $informacoes['centrocustos'] = $this->centrocusto_model->buscaTodos();

    //Carrega a view
    $this->load->template('financeiro/formularioentrada.php', $dados, $informacoes);
  }

  //Função para excluir um processo
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("entrada_model");

    //Carregar id e apagar registro com o id
    $identrada = $this->input->get('identrada');
    $this->entrada_model->deleta($identrada);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Entrada excluída com sucesso!");
    redirect("/entradas");
  }

  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Entradas";

    $this->form_validation->set_rules("idcentrocusto", "centro de custo", "required");
    $this->form_validation->set_rules("descricao", "descrição", "required");
    $this->form_validation->set_rules("valor", "valor", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("entrada_model");
      $identrada = $this->input->post("identrada");

      //validar datapagamento e datavencimento
      if ($this->input->post("datapagamento") == "") {
        $datapagamento = NULL;
      } else {
        $datapagamento = $this->input->post("datapagamento");
      }
      if ($this->input->post("datavencimento") == "") {
        $datavencimento = NULL;
      } else {
        $datavencimento = $this->input->post("datavencimento");
      }

      //validar idcliente
      if ($this->input->post("idcliente") == "") {
        $idcliente = NULL;
      } else {
        $idcliente = $this->input->post("idcliente");
      }

      if ($identrada) {
        //Carrega os valores dos campos do formulário
        $entrada = array(
            "idcentrocusto" => $this->input->post("idcentrocusto"),
            "idcliente" => $idcliente,
            "descricao" => $this->input->post("descricao"),
            "valor" => $this->input->post("valor"),
            "datavencimento" => $datavencimento,
            "datapagamento" => $datapagamento
        );

        $this->entrada_model->salvaEditado($entrada, $identrada);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idtipocontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidentrada')");
        $identrada = $query->row_array();
        //Carrega os valores dos campos do formulário
        $entrada = array(
            "identrada" => $identrada['nextval'],
            "idcentrocusto" => $this->input->post("idcentrocusto"),
            "idcliente" => $idcliente,
            "descricao" => $this->input->post("descricao"),
            "valor" => $this->input->post("valor"),
            "datavencimento" => $datavencimento,
            "datapagamento" => $datapagamento
        );

        $this->entrada_model->salva($entrada);
        $this->session->set_flashdata("success", "Entrada gravada com sucesso!");
      }

      redirect("/entradas");
    } else {
      $this->load->template("financeiro/formularioentrada.php", $dados);
    }
  }

  public function geraRelatorio() {
    $pdf = new FPDF("P", "pt", "A4");
    $pdf->AddPage();

    //Carrega a lista de entradas
    $this->load->model("entrada_model");
    $entradas = $this->entrada_model->buscaTodosData();
    $pdf->SetFont('arial', 'B', 12);
    $pdf->Cell(0, 5, "Relatório de Entradas", 0, 1, 'L');
    $pdf->Ln(8);
    $pdf->Ln(8);
    $pdf->Ln(8);
    $pdf->Ln(8);
    if (is_array($entradas) && count($entradas) > 0) {
      foreach ($entradas as $entrada) {
        $pdf->SetFont('arial', 'B', 12);
        $pdf->Cell(0, 5, "Descrição:".$entrada['descricao'], 0, 1, 'L');
        $pdf->Ln(8);
        $pdf->Ln(8);
        $pdf->Cell(0, 5, "Valor: R$ ".$entrada['valor'], 0, 1, 'L');
        $pdf->Ln(8);
        $pdf->Ln(8);
        $datapagamento = "";
        if($entrada['datapagamento'] != ""){
          $datapagamento = dataPostgresParaPtBr($entrada['datapagamento']);
        }
        $pdf->Cell(0, 5, "Data de Pagamento: ".$datapagamento, 0, 1, 'L');
        $pdf->Ln(8);
        $pdf->Ln(8);
        $datavencimento = "";
        if($entrada['datavencimento'] != ""){
          $datavencimento = dataPostgresParaPtBr($entrada['datavencimento']);
        }
        $pdf->Cell(0, 5, "Data de Vencimento: ".$datavencimento, 0, 1, 'L');
        $pdf->Ln(8);
        $pdf->Ln(8);
        $pdf->Ln(8);
        $pdf->Ln(8);
        $pdf->Ln(8);
        $pdf->Ln(8);
      }
    }

    $pdf->Output("relatorio-entradas.pdf", "D");
  }

}
