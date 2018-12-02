<?php

class Entrada_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.entrada")->result_array();
  }

  public function buscaEntrada($identrada) {
    $this->db->where("identrada", $identrada);
    $entrada = $this->db->get("shcliente.entrada")->row_array();

    return $entrada;
  }
  
  public function buscaEntradaCentroCusto($idcentrocusto) {
    $this->db->where("idcentrocusto", $idcentrocusto);
    $entradas = $this->db->get("shcliente.entrada")->result_array();

    return $entradas;
  }

  public function salva($entrada) {
    $this->db->insert("shcliente.entrada", $entrada);
  }

  public function salvaEditado($entrada, $identrada) {
    $this->db->where('identrada', $identrada);
    $this->db->update("shcliente.entrada", $entrada);
  }

  public function deleta($identrada) {
    $this->db->where('identrada', $identrada);
    $this->db->delete('shcliente.entrada');
  }

}
