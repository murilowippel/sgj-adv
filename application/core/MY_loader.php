<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MY_Loader extends CI_Loader {

  //nome da view, dados (título da página), valores
  public function template($nome, $dados = array(), $valores = null) {
    $this->view("cabecalho.php", $dados);
    $this->view($nome, $valores);
    $this->view("rodape.php");
  }

}
