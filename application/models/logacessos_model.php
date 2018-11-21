<?php

class LogAcessos_model extends CI_Model {

  public function salva($logacessos) {
    $this->db->insert("shadmin.logacessos", $logacessos);
  }
  
  public function buscaTodos() {
    return $this->db->get("shadmin.logacessos")->result_array();
  }

}
