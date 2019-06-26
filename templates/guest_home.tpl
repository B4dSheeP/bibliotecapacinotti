{include file="guest_header.tpl"}
  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">{$poetic_period}</div>
        <div class="intro-heading"></div>
     <!--   <div class="intro-heading text-uppercase">Questo lungo viaggio immobile che chiamiamo leggere.</div> -->
        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#book">Richiedi un libro</a>
      </div>
    </div>
  </header>


  <!-- Contact -->
  <section id="contact">
    <div id="book" class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-heading text-uppercase text-center">Chiedi un libro!</h2>
          <h3 class="section-subheading text-muted text-center">mandaci la tua richiesta!</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form action="/search_book" novalidate="novalidate">
			  <input type="hidden" name="token" value="1">
            <div class="row">
              <div class="col-md-6 container" >
                <div class="form-group text-align">
                  <input class="form-control" id="Titolo"  name="title" type="text" placeholder="Titolo" required="" data-validation-required-message="Titolo">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="Autore" name="author" type="text" placeholder="Autore" required="" data-validation-required-message="Autore">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <select class="form-control" id="Categoria "name="category" data-validation-required-message="Categoria">
                    <option value="" selected>CATEGORIA</option>
                    <option value="0" >OPERE GENERALI</option>
                    <option value="1">FILOSOFIA E DISCIPLINE CONNESSE</option>
                    <option value="2">RELIGIONE</option>
                    <option value="3">SCIENZE SOCIALI</option>
                    <option value="4">LINGUISTICA</option>
                    <option value="5">SCIENZE PURE</option>
                    <option value="6">SCIENZE APPLICATE</option>
                    <option value="7">ARTI</option>
                    <option value="8">LETTERATURA</option>
                    <option value="9">GEOGRAFIA E STORIA</option>
                  </select>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button style="margin: 5px;" id="search" class="btn btn-primary btn-xl text-uppercase" type="submit">Cerca</button>
			  </div>
            </div>
          </form>
		  <div class="col-md-6 container">
			<div class="col-lg-12 text-center">
				<a href="/search_book?token=1&title=&author=&category="><button style="margin: 5px;" class="btn btn-primary btn-xl text-uppercase">Mostra tutti i libri</button></a>
			</div>
		  </div>
        </div>
      </div>
    </div>
  </section>
{include file="guest_footer.tpl"}
