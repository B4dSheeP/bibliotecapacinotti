{include file="admin_header.tpl"}
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
				{foreach from=$books key=k item=i}
                  <tr>
					<td>{$i.bookid}</td>
                    <td>{$i.title}</td>
                    <td>{$i.author}</td>
                    <td>{$i.editor}</td>
                    <td>{$i.category}</td>
                    <td>{$i.location}</td>
                    <td>{$i.notes}</td>
                    <td><i class="fas fa-traffic-light fa-3x" style="color: {$i.state}"></i></td>
                    <td><a class="btn btn-primary" role="button" href="{$i.mod_url}"><i class="fas fa-cogs fa-2x"></i></a></td>
                  </tr>
                {/foreach}
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

{include file="admin_footer.tpl"}
