<?php

class Atualizacao_model extends CI_Model {
  
  //Busca todas as atualizações de um processo
  public function buscaTodosProcesso($idprocesso) {
    $this->db->where("idprocesso", $idprocesso);
    $atualizacao = $this->db->get("shcliente.atualizacaoprocesso")->result_array();
    
    return $atualizacao;
  }
  
  //Busca um registro de atualização
  public function buscaAtualizacaoProcesso($idatualizacaoprocesso) {
    $this->db->where("idatualizacaoprocesso", $idatualizacaoprocesso);
    $atualizacao = $this->db->get("shcliente.atualizacaoprocesso")->row_array();

    return $atualizacao;
  }

  public function salva($atualizacao) {
    $this->db->insert("shcliente.atualizacaoprocesso", $atualizacao);
  }

  public function salvaEditado($atualizacao, $idatualizacaoprocesso) {
    $this->db->where('idatualizacaoprocesso', $idatualizacaoprocesso);
    $this->db->update("shcliente.atualizacaoprocesso", $atualizacao);
  }

  public function deleta($idatualizacaoprocesso) {
    $this->db->where('idatualizacaoprocesso', $idatualizacaoprocesso);
    $this->db->delete('shcliente.atualizacaoprocesso');
  }

}
