{include file="admin_header.tpl"}
    <div id="content-wrapper">

      <div class="container-fluid">
		<!-- Page Content -->
        <h1>{$act_page}</h1>
        <hr>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Compila il seguente modulo</div>
          <div class="card-body">
								<form class="form-horizontal" action="{$form_fields.action}" method='POST'>
								<fieldset>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="title">Titolo</label>  
								  <div class="col-md-4">
								  <input id="title" name="title" type="text" placeholder="" class="form-control input-md" value="{$form_fields.title}">
									
								  </div>
								</div>
									
								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="editor">Editore</label>  
								  <div class="col-md-4">
								  <input id="editor" name="editor" type="text" placeholder="" class="form-control input-md" value="{$form_fields.editor}">
									
								  </div>
								</div>

								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="author">Autore</label>  
								  <div class="col-md-4">
								  <input id="author" name="author" type="text" placeholder="" class="form-control input-md" value="{$form_fields.author}">
									
								  </div>
								</div>
								<!-- Text input-->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="category">Catalogazione</label>  
								  <div class="col-md-4">
								  <input id="category" name="category" type="text" placeholder="" class="form-control input-md" value="{$form_fields.category}" >
									
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-md-4 control-label" for="location">Posizione</label>  
								  <div class="col-md-4">
								  <input id="location" name="location" type="text" placeholder="" class="form-control input-md" value="{$form_fields.location}" >
									
								  </div>
								</div>

								<!-- Textarea -->
								<div class="form-group">
								  <label class="col-md-4 control-label" for="notes">Annotazioni</label>
								  <div class="col-md-4">                     
									<textarea class="form-control" id="notes" name="notes">{$form_fields.notes}</textarea>
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
        {if $delete_link!=NULL} 
			<div class="card-footer small text-muted"><a href='{$delete_link}'>Elimina definitivamente</a></div> 
        {/if}
        </div>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->

{include file="admin_footer.tpl"}
