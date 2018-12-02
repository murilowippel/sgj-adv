<?php

class Agenda_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.compromisso")->result_array();
  }

  public function buscaCompromisso($idcompromisso) {
    $this->db->where("idcompromisso", $idcompromisso);
    $compromisso = $this->db->get("shcliente.compromisso")->row_array();

    return $compromisso;
  }

  public function salva($compromisso) {
    $this->db->insert("shcliente.compromisso", $compromisso);
  }

  public function salvaEditado($compromisso, $idcompromisso) {
    $this->db->where('idcompromisso', $idcompromisso);
    $this->db->update("shcliente.compromisso", $compromisso);
  }

  public function deleta($idcompromisso) {
    $this->db->where('idcompromisso', $idcompromisso);
    $this->db->delete('shcliente.compromisso');
  }

}