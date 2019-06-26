<?php
/* Smarty version 3.1.33, created on 2019-05-31 00:11:26
  from '/home/biblioteve/www/templates/admin_book_scheme.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5cf0550e959582_12268284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6635a539f64b2e0a07890e438cbf2d859edf42bb' => 
    array (
      0 => '/home/biblioteve/www/templates/admin_book_scheme.tpl',
      1 => 1559254338,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin_header.tpl' => 1,
    'file:admin_footer.tpl' => 1,
  ),
),false)) {
function content_5cf0550e959582_12268284 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div id="content-wrapper">

      <div class="container-fluid">
		<!-- Page Content -->
        <h1><?php echo $_smarty_tpl->tpl_vars['act_page']->value;?>
</h1>
        <hr>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Compila il seguente modulo</div>
          <div class="card-body">
								<form class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['form_fields']->value['action'];?>
" method='POST'>
								<fieldset>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="title">Titolo</label>  
								  <div class="col-md-4">
								  <input id="title" name="title" type="text" placeholder="" class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['form_fields']->value['title'];?>
">
									
								  </div>
								</div>
									
								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="editor">Editore</label>  
								  <div class="col-md-4">
								  <input id="editor" name="editor" type="text" placeholder="" class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['form_fields']->value['editor'];?>
">
									
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="author">Autore</label>  
								  <div class="col-md-4">
								  <input id="author" name="author" type="text" placeholder="" class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['form_fields']->value['author'];?>
">
									
								  </div>
								</div>
								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="category">Catalogazione</label>  
								  <div class="col-md-4">
								  <input id="category" name="category" type="text" placeholder="" class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['form_fields']->value['category'];?>
" >
									
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="location">Posizione</label>  
								  <div class="col-md-4">
								  <input id="location" name="location" type="text" placeholder="" class="form-control input-md" value="<?php echo $_smarty_tpl->tpl_vars['form_fields']->value['location'];?>
" >
									
								  </div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="notes">Annotazioni</label>
								  <div class="col-md-4">                     
									<textarea class="form-control" id="notes" name="notes"><?php echo $_smarty_tpl->tpl_vars['form_fields']->value['notes'];?>
</textarea>
								  </div>
								</div>

								<!-- Button -->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="singlebutton"></label>
								  <div class="col-md-4">
									<button id="singlebutton" name="singlebutton" class="btn btn-primary">Salva</button>
								  </div>
								</div>

								</fieldset>
								</form>
								
          </div>
          <span></span>
        <?php if ($_smarty_tpl->tpl_vars['delete_link']->value != NULL) {?> 
			<div class="card-footer small text-muted"><a href='<?php echo $_smarty_tpl->tpl_vars['delete_link']->value;?>
'>Elimina definitivamente</a></div> 
        <?php }?>
        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->

<?php $_smarty_tpl->_subTemplateRender("file:admin_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
