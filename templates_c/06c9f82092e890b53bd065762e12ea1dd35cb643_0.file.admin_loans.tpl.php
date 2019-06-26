<?php
/* Smarty version 3.1.33, created on 2019-05-16 23:38:30
  from '/home/biblioteve/www/templates/admin_loans.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cddd856697b56_92907878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06c9f82092e890b53bd065762e12ea1dd35cb643' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_loans.tpl',
      1 => 1557089469,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin_header.tpl' => 1,
    'file:admin_footer.tpl' => 1,
  ),
),false)) {
function content_5cddd856697b56_92907878 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="content-wrapper">

      <div class="container-fluid">
		<!-- Page Content -->
        <h1>Prestiti</h1>
        <hr>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Prestiti attivi</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" >
                <thead>
                  <tr>
					<th>Accettato da</th>
                    <th>Nome e Cognome</th>
                    <th>Email</th>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Codice Libro</th>
                    <th>Codice Prestito</th>
                    <th>Data Ritiro </th>
                    <th>Data Riconsegna</th>
                    <th>Operazione</th>
                  </tr>
                </thead>
                <tbody>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['loans']->value, 'i', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
                  <tr>
					<td><?php echo $_smarty_tpl->tpl_vars['i']->value['admin_nome'];?>
 <?php echo $_smarty_tpl->tpl_vars['i']->value['admin_cognome'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['nome'];?>
 <?php echo $_smarty_tpl->tpl_vars['i']->value['cognome'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['email'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['titolo'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['autore'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['id_libro'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['id_prestito'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['data_inizio'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['data_fine'];?>
</td>
                    <td><a href='<?php echo $_smarty_tpl->tpl_vars['i']->value['link_giveback'];?>
'>Restituisci</a>|
                    <a href='<?php echo $_smarty_tpl->tpl_vars['i']->value['link_report'];?>
'>Sollecita</a></td>
                  </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
              </table>
            </div>
          </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->

<?php $_smarty_tpl->_subTemplateRender("file:admin_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
