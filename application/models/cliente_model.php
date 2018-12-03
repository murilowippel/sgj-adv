<?php

class Cliente_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shcliente.cliente")->result_array();
  }

  public function buscaCliente($idcliente) {
    $this->db->where("idcliente", $idcliente);
    $cliente = $this->db->get("shcliente.cliente")->row_array();

    return $cliente;
  }

  public function buscaClienteCpf($cpf) {
    $this->db->where("cpfcnpj", $cpf);
    $cliente = $this->db->get("shcliente.cliente")->row_array();

    return $cliente;
  }

  public function salva($cliente) {
    $this->db->insert("shcliente.cliente", $cliente);
  }

  public function salvaEditado($cliente, $idcliente) {
    $this->db->where('idcliente', $idcliente);
    $this->db->update("shcliente.cliente", $cliente);
  }

  public function deleta($idcliente) {
    $this->db->where('idcliente', $idcliente);
    $this->db->delete('shcliente.cliente');
  }

}
