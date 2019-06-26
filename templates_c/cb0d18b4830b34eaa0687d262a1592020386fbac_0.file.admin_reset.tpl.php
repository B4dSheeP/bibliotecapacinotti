<?php
/* Smarty version 3.1.33, created on 2019-05-27 12:57:44
  from '/home/biblioteve/www/templates/admin_reset.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cebc2a80e55b3_55536099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb0d18b4830b34eaa0687d262a1592020386fbac' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_reset.tpl',
      1 => 1558954716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cebc2a80e55b3_55536099 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

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

  <!-- Custom styles for this template-->
  <link href="/templates/css/sb-admin.css" rel="stylesheet">
	<link rel="shortcut icon" href="/templates/img/favicon.png" type="image/x-icon">
	<link rel="icon" href="/templates/img/favicon.png" type="image/x-icon">
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
      <!-- -->
        <?php echo $_smarty_tpl->tpl_vars['form']->value;?>

        <div class="text-center">
		<span class="d-block small mt-3" id="message_box"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <?php echo '<script'; ?>
 src="/templates/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/templates/vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

  <!-- Core plugin JavaScript-->
  <?php echo '<script'; ?>
 src="/templates/vendor/jquery-easing/jquery.easing.min.js"><?php echo '</script'; ?>
>

</body>

</html>
<?php }
}
