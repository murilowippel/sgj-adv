<?php

function autoriza() {
  $ci = get_instance();
  
  //Validando sessão do usuário
  $usuarioLogado = $ci->session->userdata("usuario_logado");
  if (!$usuarioLogado) {
    $ci->session->set_flashdata("danger", "Você precisa estar logado");
    redirect("/login");
  }
  return $usuarioLogado;
}
