<?php
/* Smarty version 3.1.33, created on 2019-05-16 12:25:25
  from '/home/biblioteve/www/templates/admin_home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cdd3a956ff1b6_18505637',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03391e1b78f783d8e16f853c937f806979c531f4' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_home.tpl',
      1 => 1557390549,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin_header.tpl' => 1,
    'file:admin_footer.tpl' => 1,
  ),
),false)) {
function content_5cdd3a956ff1b6_18505637 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="content-wrapper">

      <div class="container-fluid">
		<!-- Page Content -->
        <h1>Home</h1>
        <hr>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Nuove Richieste</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" >
                <thead>
                  <tr>
                    <th>Nome e Cognome</th>
                    <th>Email</th>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Codice Libro</th>
                    <th>Codice Richiesta</th>
                    <th>Data Ritiro</th>
                    <th>Rifiuta</th>
                  </tr>
                </thead>
                <tbody>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['requests']->value, 'i', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
                  <tr>
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
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['id_richiesta'];?>
</td>
                    <td>
						<form action="<?php echo $_smarty_tpl->tpl_vars['i']->value['link_accept'];?>
">
							<div class="form-group text-align">
								<input class="form-control" id="Data_Ritiro"  name="start" type="date"  required data-validation-required-message="Data_Ritiro">
								<p class="help-block text-danger"></p>
							</div>
							<div class="col-lg-12 text-center">
								<button id="search" class="btn btn-primary text-uppercase" type="submit">Accetta</button>
							</div>
						</form>
					</td>
                    <td><a href='<?php echo $_smarty_tpl->tpl_vars['i']->value['link_reject'];?>
'><button class="btn btn-primary text-uppercase">Rifiuta</button></a></td>
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
