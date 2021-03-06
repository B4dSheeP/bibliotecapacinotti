<?php
/* Smarty version 3.1.33, created on 2019-05-16 12:29:57
  from '/home/biblioteve/www/templates/admin_register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdd3ba55d2d54_32724277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'def9bd964be5250d31c8d069f2b4b7c190cb0a83' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_register.tpl',
      1 => 1558002623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cdd3ba55d2d54_32724277 (Smarty_Internal_Template $_smarty_tpl) {
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
  	<link rel="icon" href="/templates/img/favicon.png" type="image/x-icon">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registra un Amministratore</div>
      <div class="card-body">
        <form method='POST' action='/admin/register'>
			<input type="hidden" name="token" value="1">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name='name' class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">Nome</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name='surname' class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Cognome</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name='email' class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name='password' class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="confirmPassword"  class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Conferma password</label>
                </div>
              </div>
            </div>
          </div>
       <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputMaster" name='masterkey' class="form-control" placeholder="MasterKey" required="required">
              <label for="inputMaster">MasterKey</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Registra</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="/admin">Login</a>
        </div>
      </div>
    </div>
  </div>
  <?php echo '<script'; ?>
> 
	if(document.getElementById('inputPassword').value!=document.getElementById('confirmPassword').value){
		alert("password errate");
	}
  <?php echo '</script'; ?>
> 
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
