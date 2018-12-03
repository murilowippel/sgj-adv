<?php

class Notificacao_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.notificacao")->result_array();
  }

  public function buscaNotificacao($idnotificacao) {
    $this->db->where("idnotificacao", $idnotificacao);
    $notificacao = $this->db->get("shcliente.notificacao")->row_array();

    return $notificacao;
  }

  public function salva($notificacao) {
    $this->db->insert("shcliente.notificacao", $notificacao);
  }
  
  public function buscaNotificacoesDia($idusuario){
    $sql = "SELECT * FROM shcliente.notificacao WHERE date(dataenvio) = CURRENT_DATE AND idusuariodestino = ".$idusuario;
    $query = $this->db->query($sql);

    return $query->result_array();
  }

  public function salvaEditado($notificacao, $idnotificacao) {
    $this->db->where('idnotificacao', $idnotificacao);
    $this->db->update("shcliente.notificacao", $notificacao);
  }

  public function deleta($idnotificacao) {
    $this->db->where('idnotificacao', $idnotificacao);
    $this->db->delete('shcliente.notificacao');
  }

}