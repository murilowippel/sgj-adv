<?php

class Usuario_model extends CI_Model {

  public function salva($usuario) {
    $this->db->insert("usuarios", $usuario);
  }
  
  public function buscaTodos() {
    return $this->db->get("shadmin.usuario")->result_array();
  }

  public function buscaPorEmailESenha($email, $senha) {
    $this->db->where("email", $email);
    $this->db->where("senha", $senha);
    $usuario = $this->db->get("shadmin.usuario")->row_array();

    return $usuario;
  }

}
