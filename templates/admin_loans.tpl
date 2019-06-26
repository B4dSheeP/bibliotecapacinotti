{include file="admin_header.tpl"}
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
				{foreach from=$loans key=k item=i}
                  <tr>
					<td>{$i.admin_nome} {$i.admin_cognome}</td>
                    <td>{$i.nome} {$i.cognome}</td>
                    <td>{$i.email}</td>
                    <td>{$i.titolo}</td>
                    <td>{$i.autore}</td>
                    <td>{$i.id_libro}</td>
                    <td>{$i.id_prestito}</td>
                    <td>{$i.data_inizio}</td>
                    <td>{$i.data_fine}</td>
                    <td><a href='{$i.link_giveback}'>Restituisci</a>|
                    <a href='{$i.link_report}'>Sollecita</a></td>
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
