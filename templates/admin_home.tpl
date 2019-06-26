{include file="admin_header.tpl"}
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
				{foreach from=$requests key=k item=i}
                  <tr>
                    <td>{$i.nome} {$i.cognome}</td>
                    <td>{$i.email}</td>
                    <td>{$i.titolo}</td>
                    <td>{$i.autore}</td>
                    <td>{$i.id_libro}</td>
                    <td>{$i.id_richiesta}</td>
                    <td>
						<form action="{$i.link_accept}">
							<div class="form-group text-align">
								<input class="form-control" id="Data_Ritiro"  name="start" type="date"  required data-validation-required-message="Data_Ritiro">
								<p class="help-block text-danger"></p>
							</div>
							<div class="col-lg-12 text-center">
								<button id="search" class="btn btn-primary text-uppercase" type="submit">Accetta</button>
							</div>
						</form>
					</td>
                    <td><a href='{$i.link_reject}'><button class="btn btn-primary text-uppercase">Rifiuta</button></a></td>
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
