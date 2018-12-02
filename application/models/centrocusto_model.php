<?php

class CentroCusto_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.centrocusto")->result_array();
  }

  public function buscaCentroCusto($idcentrocusto) {
    $this->db->where("idcentrocusto", $idcentrocusto);
    $centrocusto = $this->db->get("shcliente.centrocusto")->row_array();

    return $centrocusto;
  }

  public function salva($centrocusto) {
    $this->db->insert("shcliente.centrocusto", $centrocusto);
  }

  public function salvaEditado($centrocusto, $idcentrocusto) {
    $this->db->where('idcentrocusto', $idcentrocusto);
    $this->db->update("shcliente.centrocusto", $centrocusto);
  }

  public function deleta($idcentrocusto) {
    $this->db->where('idcentrocusto', $idcentrocusto);
    $this->db->delete('shcliente.centrocusto');
  }

}