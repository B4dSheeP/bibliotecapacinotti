<?php
/* Smarty version 3.1.33, created on 2019-05-16 12:53:17
  from '/home/biblioteve/www/templates/guest_search.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdd411d268b50_17095014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb58f558cc5ef4bf64d1baf7f13b46dc3a7552f6' => 
    array (
      0 => '/home/biblioteve/www/templates/guest_search.tpl',
      1 => 1557934803,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cdd411d268b50_17095014 (Smarty_Internal_Template $_smarty_tpl) {
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
  <!-- DataTable style -->
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  	<link rel="shortcut icon" href="/templates/img/favicon.png" type="image/x-icon">
	<link rel="icon" href="/templates/img/favicon.png" type="image/x-icon">

	<style>
		.dataTables_wrapper .dataTables_length,
		.dataTables_wrapper .dataTables_filter,
		.dataTables_wrapper .dataTables_info,
		.dataTables_wrapper .dataTables_processing,
		.dataTables_wrapper .dataTables_paginate {
			color: #FFF !important;
		} 
		.table th{
			color: #fed136 !important; 
		}
	</style>

</head>

<body id="page-top">
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
  <!-- Header -->
  <!--<header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Benvenuto nella Biblioteca Pacinotti</div>
        <div class="intro-heading text-uppercase">Questo lungo viaggio immobile che chiamiamo leggere.</div>
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Dimmi di più</a>
      </div>
    </div>
  </header>-->


  <!-- Contact -->
  <section id="contact" style="color:#deb887">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading text-uppercase">Ecco i risultati della tua ricerca!</h2>
          <h3 class="section-subheading text-muted">Seleziona il libro che vuoi...</h3>
        </div>
      </div>
      <div class="row">
        <div class="container mb-3 mt-3">
		<table id="bt" class="display ui celled table" style="width:100%;">
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Editore</th>
                <th>Richiedi</th>

            </tr>
        </thead>
        <tbody>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'i', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value['titolo'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value['autore'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['i']->value['editore'];?>
</td>
                <td><a class="btn btn-primary" role="button" href="<?php echo $_smarty_tpl->tpl_vars['i']->value['book_url'];?>
"><i class="far fa-bookmark" style="color:black"></i></a></td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    <!--    <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        -->
    </table>
		</div>
      </div>
    </div>
  </section>

   <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright"></span>
        </div>
        <div class="col-md-4">
          <span class="copyright"><?php echo $_smarty_tpl->tpl_vars['footer_phrase']->value;?>
</span>
        </div>
        <div class="col-md-4">
          <span class="copyright"></span>
        </div>
      </div>
    </div>
  </footer>
 
  <!-- Bootstrap core JavaScript -->
  <?php echo '<script'; ?>
 src="/templates/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/templates/vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

  <!-- Plugin JavaScript -->
  <?php echo '<script'; ?>
 src="/templates/vendor/jquery-easing/jquery.easing.min.js"><?php echo '</script'; ?>
>

  <!-- Contact form JavaScript -->
  <?php echo '<script'; ?>
 src="/templates/js/jqBootstrapValidation.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/templates/js/contact_me.js"><?php echo '</script'; ?>
>

  <!-- Custom scripts for this template -->
  <?php echo '<script'; ?>
 src="/templates/js/agency.min.js"><?php echo '</script'; ?>
>
  <!-- DataTbles -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
  <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
> 
	  
	$(document).ready(function() {
    $('#bt').DataTable({"ordering": false, "filter" : false});
} );
	
  <?php echo '</script'; ?>
> 
</body>

</html>
<?php }
}
