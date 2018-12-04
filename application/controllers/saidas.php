<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once("fpdf/fpdf.php");

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Saidas extends CI_Controller {

  //Função para abrir a listagem de centros de custo
  public function index() {
    autoriza();

    $dados['titulopagina'] = "Financeiro - Saídas";

    //Carrega a lista de saídas
    $this->load->model("saida_model");
    $saidas['saidas'] = $this->saida_model->buscaTodos();

    $this->load->model("centrocusto_model");

    $this->load->template('financeiro/saidas.php', $dados, $saidas);
  }

  //Função para abrir a página inicial após logar
  public function novo() {
    autoriza();

    $dados['titulopagina'] = "Cadastro de Saídas";

    //Carregar os centros de custos
    $this->load->model("centrocusto_model");
    $informacoes['centrocustos'] = $this->centrocusto_model->buscaTodos();

    $this->load->template('financeiro/formulariosaida.php', $dados, $informacoes);
  }

  //Função para abrir editar um contrato
  public function editar($idsaida) {
    //Valida a sessão
    autoriza();

    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Saídas";

    //Carregar registro pelo id
    $this->load->model("saida_model");
    $informacoes['saida'] = $this->saida_model->buscaSaida($idsaida);

    //Carregar os centros de custos
    $this->load->model("centrocusto_model");
    $informacoes['centrocustos'] = $this->centrocusto_model->buscaTodos();

    //Carrega a view
    $this->load->template('financeiro/formulariosaida.php', $dados, $informacoes);
  }

  //Função para excluir uma saida
  public function deletar() {
    //Valida a sessão
    autoriza();

    $this->load->model("saida_model");

    //Carregar id e apagar registro com o id
    $idsaida = $this->input->get('idsaida');
    $this->saida_model->deleta($idsaida);

    //Mensagem de sucesso e redirecionar
    $this->session->set_flashdata("success", "Saída excluída com sucesso!");
    redirect("/saidas");
  }

  public function gravar() {
    //Valida a sessão
    autoriza();
    //Atribui o título da página
    $dados['titulopagina'] = "Cadastro de Saídas";

    $this->form_validation->set_rules("idcentrocusto", "centro de custo", "required");
    $this->form_validation->set_rules("descricao", "descrição", "required");
    $this->form_validation->set_rules("valor", "valor", "required");
    $this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");

    $sucesso = $this->form_validation->run();
    if ($sucesso) {
      $this->load->model("saida_model");
      $idsaida = $this->input->post("idsaida");

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

      if ($idsaida) {
        //Carrega os valores dos campos do formulário
        $saida = array(
          "idcentrocusto" => $this->input->post("idcentrocusto"),
          "descricao" => $this->input->post("descricao"),
          "valor" => $this->input->post("valor"),
          "datavencimento" => $datavencimento,
          "datapagamento" => $datapagamento
        );

        $this->saida_model->salvaEditado($saida, $idsaida);
        $this->session->set_flashdata("success", "Dados atualizados com sucesso!");
      } else {
        //Busca o próximo valor da sequence de idtipocontrato
        $query = $this->db->query("SELECT nextval('shcliente.sqidsaida')");
        $idsaida = $query->row_array();
        //Carrega os valores dos campos do formulário
        $saida = array(
          "idsaida" => $idsaida['nextval'],
          "idcentrocusto" => $this->input->post("idcentrocusto"),
          "descricao" => $this->input->post("descricao"),
          "valor" => $this->input->post("valor"),
          "datavencimento" => $datavencimento,
          "datapagamento" => $datapagamento
        );

        $this->saida_model->salva($saida);
        $this->session->set_flashdata("success", "Saída gravada com sucesso!");
      }

      redirect("/saidas");
    } else {
      $this->load->template("financeiro/formulariosaida.php", $dados);
    }
  }
  
  public function geraRelatorio() {
    $pdf = new FPDF("P", "pt", "A4");
    $pdf->AddPage();

    //Carrega a lista de saídas
    $this->load->model("saida_model");
    $saidas = $this->saida_model->buscaTodosData();
    $pdf->SetFont('arial', 'B', 12);
    $pdf->Cell(0, 5, "Relatório de Saídas", 0, 1, 'L');
    $pdf->Ln(8);
    $pdf->Ln(8);
    $pdf->Ln(8);
    $pdf->Ln(8);
    if (is_array($saidas) && count($saidas) > 0) {
      foreach ($saidas as $saida) {
        $pdf->SetFont('arial', 'B', 12);
        $pdf->Cell(0, 5, "Descrição:".$saida['descricao'], 0, 1, 'L');
        $pdf->Ln(8);
        $pdf->Ln(8);
        $pdf->Cell(0, 5, "Valor: R$ ".$saida['valor'], 0, 1, 'L');
        $pdf->Ln(8);
        $pdf->Ln(8);
        $datapagamento = "";
        if($saida['datapagamento'] != ""){
          $datapagamento = dataPostgresParaPtBr($saida['datapagamento']);
        }
        $pdf->Cell(0, 5, "Data de Pagamento: ".$datapagamento, 0, 1, 'L');
        $pdf->Ln(8);
        $pdf->Ln(8);
        $datavencimento = "";
        if($saida['datavencimento'] != ""){
          $datavencimento = dataPostgresParaPtBr($saida['datavencimento']);
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

    $pdf->Output("relatorio-saidas.pdf", "D");
  }

}
