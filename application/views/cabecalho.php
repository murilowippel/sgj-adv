<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Murilo Henrique Wippel">
    <link rel="icon" href="<?=base_url('img')?>/favicon.png" type="image/png">
    
    <title><?php echo $titulopagina ?> - SGJ</title>

    <link href="<?= base_url("css/bootstrap.min.css") ?>" rel="stylesheet">
    <!--<link href="<?= base_url("fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="<?= base_url("css/dataTables.bootstrap4.css") ?>" rel="stylesheet">
    <link href="<?= base_url("css/sb-admin.css") ?>" rel="stylesheet">
    <link href="<?= base_url("css/sgj-adv.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://www.jquery-az.com/boots/css/bootstrap-multiselect/bootstrap-multiselect.css" type="text/css">
    
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <img style="width:32px;height: 32px;margin-right: 10px;" src="<?= base_url("img/") ?>mace.png" />
      <a class="navbar-brand mr-1" href="<?= base_url("/") ?>">SGJ</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
<!--        <div class="input-group">
          <input type="text" class="form-control" placeholder="Buscar cliente..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>-->
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">1+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Você tem um novo compromisso</a>
            <span class="pull-right text-muted small"><em>Recebido em 10/10/2010 - 10:10</em>
            </span>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $this->session->userdata['usuario_logado']['nome']; ?>
          </a>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url("usuarios") ?>">Configurações</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("/") ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Página Inicial</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("clientes") ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Clientes</span>
          </a>
        </li>
        <li class="nav-item dropdown"><!--active-->
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Contratos</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url("tiposcontratos") ?>">Tipos de Contrato</a>
            <a class="dropdown-item" href="<?= base_url("contratos") ?>">Contratos</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("processos") ?>">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Processos</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("agenda") ?>">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Agenda</span>
          </a>
        </li>
        <li class="nav-item dropdown"><!--active-->
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Financeiro</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url("centrocusto") ?>">Centros de Custo</a>
            <a class="dropdown-item" href="<?= base_url("entradas") ?>">Entradas</a>
            <a class="dropdown-item" href="<?= base_url("saidas") ?>">Saídas</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("ged") ?>">
            <i class="fas fa-fw fa-file-word"></i>
            <span>G.E.D</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url("usuarios") ?>">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Usuários</span>
          </a>
        </li>
      </ul>