{include file="guest_header.tpl"}

  <!-- Contact -->
  <section id="contact">
    <div id="book" class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading text-uppercase text-center">Compila il seguente modulo!</h2>
          <h3 class="section-subheading text-muted text-center">Stai richiedendo il libro: {$demand.title}<br>I prestiti hanno durata di max 30gg dalla data del ritiro</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form action="/demand_book" method='POST' novalidate="novalidate">
			  <input type="hidden" name="token" value="1">
            <div class="row">
              <div class="col-md-6 container" >
                <div class="form-group text-align">
                  <input class="form-control" id="Nome"  style="text-transform:uppercase" name="name" value="{$demand.name}" type="text" placeholder="Nome" required="" data-validation-required-message="Nome">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group text-align">
                  <input class="form-control" id="Cognome" style="text-transform:uppercase" name="surname" value="{$demand.surname}" type="text" placeholder="Cognome" required="" data-validation-required-message="Cognome">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group text-align">
					
                  <input class="form-control" id="Codice_Fiscale"  style="text-transform:uppercase" name="cf"  value="{$demand.cf}" size='16' type="text" placeholder="Codice Fiscale" required="" data-validation-required-message="Codice_Fiscale">
                  <p class="help-block text-danger"></p>
                </div>
          <!--      <div class="form-group text-align">
					 <label class="control-label text-muted" for="date">Data Ritiro</label>
                  <input class="form-control" id="Data_Ritiro"  name="start" type="text" placeholder="DD/MM/YYYY" required="" data-validation-required-message="Data_Ritiro">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group text-align">
					 <label class="control-label text-muted" for="date">Data Restituzione</label>
                  <input class="form-control" id="Data_Restituzione"  name="end" type="text" placeholder="DD/MM/YYYY" required="" data-validation-required-message="Data_Restituzione">
                  <p class="help-block text-danger"></p>
                </div> -->
                <div class="form-group">
                  <input class="form-control" id="Email" name="email"  value="{$demand.email}" type="email" placeholder="Email" required="" data-validation-required-message="Email">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="search" class="btn btn-primary btn-xl text-uppercase" type="submit">Invia Richiesta</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

{include file="guest_footer.tpl"}
