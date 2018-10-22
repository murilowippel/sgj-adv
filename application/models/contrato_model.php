<?php

class Contrato_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.contrato")->result_array();
  }

  public function buscaContrato($idcontrato) {
    $this->db->where("idcontrato", $idcontrato);
    $contrato = $this->db->get("shcliente.contrato")->row_array();

    return $contrato;
  }

  public function salva($contrato) {
    $this->db->insert("shcliente.contrato", $contrato);
  }

  public function salvaEditado($contrato, $idcontrato) {
    $this->db->where('idcontrato', $idcontrato);
    $this->db->update("shcliente.contrato", $contrato);
  }

  public function deleta($idcontrato) {
    $this->db->where('idcontrato', $idcontrato);
    $this->db->delete('shcliente.contrato');
  }

}