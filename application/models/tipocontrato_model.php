<?php

class TipoContrato_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.tipocontrato")->result_array();
  }

  public function buscaTipoContrato($idtipocontrato) {
    $this->db->where("idtipocontrato", $idtipocontrato);
    $tipocontrato = $this->db->get("shcliente.tipocontrato")->row_array();

    return $tipocontrato;
  }

  public function salva($tipocontrato) {
    $this->db->insert("shcliente.tipocontrato", $tipocontrato);
  }

  public function salvaEditado($tipocontrato, $idtipocontrato) {
    $this->db->where('idtipocontrato', $idtipocontrato);
    $this->db->update("shcliente.tipocontrato", $tipocontrato);
  }

  public function deleta($idtipocontrato) {
    $this->db->where('idtipocontrato', $idtipocontrato);
    $this->db->delete('shcliente.tipocontrato');
  }

}