<?php
/* Smarty version 3.1.33, created on 2019-05-31 16:48:11
  from '/home/biblioteve/www/templates/admin_books.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf13eab38a129_12348671',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fa4d848999508cf291262ea4bad5b773ad9aa15' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_books.tpl',
      1 => 1559314119,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin_header.tpl' => 1,
    'file:admin_footer.tpl' => 1,
  ),
),false)) {
function content_5cf13eab38a129_12348671 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="content-wrapper">

      <div class="container-fluid">
		<!-- Page Content -->
        <h1>Libri</h1>
        			  <div class="row container" >
						<form action="/admin/books/search" class="form-horizontal">
							<div class="row">
								<div class="form-group col-md-2">
									<label for="title" class="sr-only"></label>
									<input id="title" class="form-control input-group-lg reg_name" type="text" name="title" placeholder="Titolo">
								</div>       
								<div class="form-group col-md-2">
									<label for="author" class="sr-only"></label>
									<input id="author" class="form-control input-group-lg reg_name" type="text" name="author" placeholder="Autore">
								</div>
								<div class="form-group col-md-2">
									<label for="author" class="sr-only"></label>
									<input id="author" class="form-control input-group-lg reg_name" type="text" name="category"  placeholder="Catalogazione">
								</div>
								<div class="form-group col-md-2">
									<label for="author" class="sr-only"></label>
									<input id="author" class="form-control input-group-lg reg_name" type="text" name="bookID"  placeholder="ID Libro">
								</div>
								  <div class="form-group col-md-2">
									<button type="submit" class="btn btn-primary">Filtra</button>
								  </div>
							</div>
						</form>
				</div>
				<br />
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Lista</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" >
                <thead>
                  <tr>
					<th>ID Libro</th>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Editore</th>
                    <th>Catalogazione</th>
                    <th>Posizione</th>
                    <th>Annotazioni</th>
                    <th>Stato</th>
                    <th>Modifica</th>
                  </tr>
                </thead>
                <tbody>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'i', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['i']->value) {
?>
                  <tr>
					<td><?php echo $_smarty_tpl->tpl_vars['i']->value['bookid'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['title'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['author'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['editor'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['category'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['location'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['i']->value['notes'];?>
</td>
                    <td><i class="fas fa-traffic-light fa-3x" style="color: <?php echo $_smarty_tpl->tpl_vars['i']->value['state'];?>
"></i></td>
                    <td><a class="btn btn-primary" role="button" href="<?php echo $_smarty_tpl->tpl_vars['i']->value['mod_url'];?>
"><i class="fas fa-cogs fa-2x"></i></a></td>
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
