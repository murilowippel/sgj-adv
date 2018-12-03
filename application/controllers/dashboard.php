<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller para ações da página inicial do sistema
 * Executada por padrão
 */
class Dashboard extends CI_Controller {

  //Função para abrir a página inicial após logar
  public function index() {
    autoriza();
    
    //Models
    $this->load->model("agenda_model");
    $this->load->model("entrada_model");
    $this->load->model("saida_model");
    $this->load->model("notificacao_model");
    
    $dados['titulopagina'] = "Página Inicial";
    
    //Carregar compromissos do dia
    $informacoes['compromissos'] = $this->agenda_model->buscaCompromissosDia();
    
    $idusuario = $this->session->userdata['usuario_logado']['idusuario'];
    
    //Carregar entradas e saídas que possuam data de vencimento e que a não possuam data de pagamento
    $informacoes['entradas'] = $this->entrada_model->buscaEntradasPendentes();
    $informacoes['saidas'] = $this->saida_model->buscaSaidasPendentes();
    $informacoes['notificacoes'] = $this->notificacao_model->buscaNotificacoesDia($idusuario);
    
    $this->load->template('dashboard/dashboard.php', $dados, $informacoes);
  }

}
