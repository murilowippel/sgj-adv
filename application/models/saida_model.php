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
  
  public function buscaSaidaCentroCusto($idcentrocusto) {
    $this->db->where("idcentrocusto", $idcentrocusto);
    $saidas = $this->db->get("shcliente.saida")->result_array();

    return $saidas;
  }
  
  public function buscaSaidasPendentes(){
    $sql = "SELECT * FROM shcliente.saida WHERE datavencimento >= CURRENT_DATE AND datapagamento is null";
    $query = $this->db->query($sql);

    return $query->result_array();
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
