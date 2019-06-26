		<footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>{$footer_phrase}</span>
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
  <script src="/templates/vendor/jquery/jquery.min.js"></script>
  <script src="/templates/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/templates/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="/templates/vendor/chart.js/Chart.min.js"></script>
  <script src="/templates/vendor/datatables/jquery.dataTables.js"></script>
  <script src="/templates/vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/templates/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page
  <script src="/templates/js/demo/datatables-demo.js"></script>
  <script src="/templates/js/demo/chart-area-demo.js"></script>-->
 {literal}
  <script type="text/javascript">
		$(window).on('load',function(){
			$('#myModal').modal('show');
			});
		$(document).ready(function() {
    $('#dataTable').DataTable();
} );
	</script>
{/literal}

</body>

</html>
 
