<?php
/* Smarty version 3.1.33, created on 2019-05-16 12:29:49
  from '/home/biblioteve/www/templates/guest_header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdd3b9d6c9549_46636706',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b5343e9f3a287cd5cc9e3756abc6f23bd6354571' => 
    array (
      0 => '/home/biblioteve/www/templates/guest_header.tpl',
      1 => 1556786843,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cdd3b9d6c9549_46636706 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="it">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

  <!-- Bootstrap core CSS -->
  <link href="/templates/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
  <!-- Custom fonts for this template -->
  <link href="/templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="/templates/css/agency.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="/templates/img/favicon.png" type="image/x-icon">
	<link rel="icon" href="/templates/img/favicon.png" type="image/x-icon">
</head>

<body id="page-top">
<?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" id='link' href="/admin" data-target='#link'>Area Privata</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> 
<?php }
}
