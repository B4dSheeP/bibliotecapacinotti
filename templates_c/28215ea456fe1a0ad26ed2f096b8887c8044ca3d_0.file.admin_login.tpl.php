<?php
/* Smarty version 3.1.33, created on 2019-05-27 12:46:17
  from '/home/biblioteve/www/templates/admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cebbff9629b29_61844788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28215ea456fe1a0ad26ed2f096b8887c8044ca3d' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_login.tpl',
      1 => 1558954030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cebbff9629b29_61844788 (Smarty_Internal_Template $_smarty_tpl) {
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
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method='POST'>
          <input type="hidden" name="token" required="required" value='1'>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="inputemail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="inputpassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input type='submit' class="btn btn-primary btn-block" value="Login">
        </form>
        <div class="text-center">
		<span class="d-block small mt-3" id="message_box"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</span>
          <a class="d-block small mt-3" href="/admin/register">Registra un amministratore</a>
          <a class="d-block small" href="/admin/reset_password/step_0">Dimenticato la password?</a>
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
