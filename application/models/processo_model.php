<?php

class Processo_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.processo")->result_array();
  }

  public function buscaProcesso($idprocesso) {
    $this->db->where("idprocesso", $idprocesso);
    $processo = $this->db->get("shcliente.processo")->row_array();

    return $processo;
  }

  public function salva($processo) {
    $this->db->insert("shcliente.processo", $processo);
  }

  public function salvaEditado($processo, $idprocesso) {
    $this->db->where('idprocesso', $idprocesso);
    $this->db->update("shcliente.processo", $processo);
  }

  public function deleta($idprocesso) {
    $this->db->where('idprocesso', $idprocesso);
    $this->db->delete('shcliente.processo');
  }

}
