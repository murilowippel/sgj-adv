<?php

class Documento_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.documento")->result_array();
  }

  public function buscaDocumento($iddocumento) {
    $this->db->where("iddocumento", $iddocumento);
    $documento = $this->db->get("shcliente.documento")->row_array();

    return $documento;
  }

  public function salva($documento) {
    $this->db->insert("shcliente.documento", $documento);
  }

  public function salvaEditado($documento, $iddocumento) {
    $this->db->where('iddocumento', $iddocumento);
    $this->db->update("shcliente.documento", $documento);
  }

  public function deleta($iddocumento) {
    $this->db->where('iddocumento', $iddocumento);
    $this->db->delete('shcliente.documento');
  }

}