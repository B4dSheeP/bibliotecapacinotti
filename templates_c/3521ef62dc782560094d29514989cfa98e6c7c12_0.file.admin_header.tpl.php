<?php
/* Smarty version 3.1.33, created on 2019-05-16 12:25:09
  from '/home/biblioteve/www/templates/admin_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdd3a85a2af29_55140141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3521ef62dc782560094d29514989cfa98e6c7c12' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_header.tpl',
      1 => 1558002314,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cdd3a85a2af29_55140141 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

  <!-- Custom fonts for this template-->
  <link href="/templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="/templates/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/templates/css/sb-admin.css" rel="stylesheet">
	<link rel="shortcut icon" href="/templates/img/favicon.png" type="image/x-icon">
	<link rel="icon" href="/templates/img/favicon.png" type="image/x-icon">
</head>

<body id="page-top">
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
	<button class="btn" onclick='window.history.back()'><i class="fas fa-arrow-circle-left fa-lg" style="color: white"></i></button>
    <a class="navbar-brand mr-1" href="/admin">Pannello di Amministrazione</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

	<div class='d-none d-md-inline-block text-white ml-auto mr-0 mr-md-3 my-2 my-md-0'><?php echo $_smarty_tpl->smarty->registered_objects['admin'][0]->nome;?>
 <?php echo $_smarty_tpl->smarty->registered_objects['admin'][0]->cognome;?>
</div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Impostazioni</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/admin/logout" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/loans">
          <i class="fas  fa-fw fa-paper-plane"></i>
          <span>Prestiti</span></a>
      </li>
   <!--   <li class="nav-item">
        <a class="nav-link" href="/admin/books">
          <i class="fas fa-fw fa-book"></i>
          <span>Libri</span></a>
      </li> -->
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Libri</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="/admin/books">Lista</a>
          <a class="dropdown-item" href="/admin/new_book">Inserisci</a>
        </div>
      </li>
    </ul>
<?php }
}
