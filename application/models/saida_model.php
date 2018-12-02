<?php

class Saida_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.saida")->result_array();
  }

  public function buscaSaida($idsaida) {
    $this->db->where("idsaida", $idsaida);
    $saida = $this->db->get("shcliente.saida")->row_array();

    return $saida;
  }

  public function salva($saida) {
    $this->db->insert("shcliente.saida", $saida);
  }

  public function salvaEditado($saida, $idsaida) {
    $this->db->where('idsaida', $idsaida);
    $this->db->update("shcliente.saida", $saida);
  }

  public function deleta($idsaida) {
    $this->db->where('idsaida', $idsaida);
    $this->db->delete('shcliente.saida');
  }

}
