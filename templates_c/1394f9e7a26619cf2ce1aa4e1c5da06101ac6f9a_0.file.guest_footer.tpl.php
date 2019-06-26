<?php
/* Smarty version 3.1.33, created on 2019-05-16 12:29:49
  from '/home/biblioteve/www/templates/guest_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdd3b9d6d2b86_58189444',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1394f9e7a26619cf2ce1aa4e1c5da06101ac6f9a' => 
    array (
      0 => '/home/biblioteve/www/templates/guest_footer.tpl',
      1 => 1556618056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cdd3b9d6d2b86_58189444 (Smarty_Internal_Template $_smarty_tpl) {
?>
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
  
  <?php echo '<script'; ?>
 type="text/javascript">
		$(window).on('load',function(){
			$('#myModal').modal('show');
			});
	<?php echo '</script'; ?>
>
	
</body>

</html> 
<?php }
}
