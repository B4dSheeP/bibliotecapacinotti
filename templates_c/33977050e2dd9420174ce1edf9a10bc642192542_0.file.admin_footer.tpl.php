<?php
/* Smarty version 3.1.33, created on 2019-05-16 12:25:09
  from '/home/biblioteve/www/templates/admin_footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdd3a85a43456_96076566',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33977050e2dd9420174ce1edf9a10bc642192542' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_footer.tpl',
      1 => 1556924245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cdd3a85a43456_96076566 (Smarty_Internal_Template $_smarty_tpl) {
?>		<footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span><?php echo $_smarty_tpl->tpl_vars['footer_phrase']->value;?>
</span>
          </div>
        </div>
      </footer>
  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Vuoi davvero andartene?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleziona "Logout" se sei intenzionato a terminare la tua attuale sessione</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancella</button>
          <a class="btn btn-primary" href="/admin/logout">Logout</a>
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

  <!-- Page level plugin JavaScript-->
  <?php echo '<script'; ?>
 src="/templates/vendor/chart.js/Chart.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/templates/vendor/datatables/jquery.dataTables.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/templates/vendor/datatables/dataTables.bootstrap4.js"><?php echo '</script'; ?>
>

  <!-- Custom scripts for all pages-->
  <?php echo '<script'; ?>
 src="/templates/js/sb-admin.min.js"><?php echo '</script'; ?>
>

  <!-- Demo scripts for this page
  <?php echo '<script'; ?>
 src="/templates/js/demo/datatables-demo.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/templates/js/demo/chart-area-demo.js"><?php echo '</script'; ?>
>-->
 
  <?php echo '<script'; ?>
 type="text/javascript">
		$(window).on('load',function(){
			$('#myModal').modal('show');
			});
		$(document).ready(function() {
    $('#dataTable').DataTable();
} );
	<?php echo '</script'; ?>
>


</body>

</html>
 
<?php }
}
