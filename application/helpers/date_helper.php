<?php

function dataPtBrParaPostgres($dataPtBr) {
  $partes = explode("/", $dataPtBr);
  return "${partes[2]}-{$partes[1]}-{$partes[0]}";
}

function dataPostgresParaPtBr($dataPostgres) {
    $data = new DateTime($dataPostgres);
    return $data->format("d/m/Y");
}