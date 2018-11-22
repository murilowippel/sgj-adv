<?php

class Usuario_model extends CI_Model {

  public function buscaTodos() {
    return $this->db->get("shadmin.usuario")->result_array();
  }

  public function buscaPorEmailESenha($email, $senha) {
    $this->db->where("email", $email);
    $this->db->where("senha", $senha);
    $usuario = $this->db->get("shadmin.usuario")->row_array();

    return $usuario;
  }

  public function buscaUsuario($idusuario) {
    $this->db->where("idusuario", $idusuario);
    $usuario = $this->db->get("shadmin.usuario")->row_array();

    return $usuario;
  }

  public function salva($usuario) {
    $this->db->insert("shadmin.usuario", $usuario);
  }

  public function salvaEditado($usuario, $idusuario) {
    $this->db->where('idusuario', $idusuario);
    $this->db->update("shadmin.usuario", $usuario);
  }

}
