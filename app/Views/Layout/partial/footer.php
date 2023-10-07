  <!-- ScrollToTop Button -->
  <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></a>
  <!-- ScrollToTop Button END-->

  <!-- bloc-7 -->
  <div class="bloc full-width-bloc b-parallax l-bloc">
    <div class="container bloc-lg bloc-sm-lg">
      <div class="row align-items-center ml-lg-0 no-gutters">
        <div class="col-md-3 col-sm-6 align-self-center offset-lg-3">
          <h1 class="text-sm-left text-center h4-style text-lg-left">
            CONTATTACI
          </h1>
          <h5 class="mb-4 btn-resize-mode h5-style mb-lg-5">
            associazionibenefiche@gmail.com
          </h5>
        </div>
        <div class="col-md-6 col-sm-6 mb-3">
          <div class="contact-us-section">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="contact-form" action="<?= site_url('reports/store') ?>" method="POST">
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <label for="name">Nome</label>
                          <input
                            type="text"
                            class="form-control custom-form"
                            id="name"
                            name="name"
                            placeholder="Inserisci il tuo nome"
                            required
                            onfocus="addBorder(this)"
                            onblur="removeBorder(this)"
                            value=""
                            aria-invalid="true">
                        </div>

                        <div class="form-group col-md-4">
                          <label for="email">Email</label>
                          <input type="email" class="form-control custom-form" id="email" name="email" placeholder="Inserisci la tua email" required
                          onfocus="addBorder(this)"
                            onblur="removeBorder(this)">
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-8">
                          <label for="message">Messaggio</label>
                          <textarea class="form-control custom-form" id="message" name="message" rows="4" placeholder="Scrivi qui il tuo messaggio..." required
                          onfocus="addBorder(this)"
                            onblur="removeBorder(this)"></textarea>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-8">
                        <div class="text-center">
                          <button type="submit"
                            class="btn btn-clean btn-lg btn-c-4129 block" >
                            Invia
                          </button>
                        </div>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- bloc-7 END -->

<style>
  /* .form{
    background: #000;
  } */
  .custom-form {
    fill: none;
    background: transparent;
    background-color:transparent;
    border: none;
    border-bottom: 1px solid gray;
  }

  .custom-form:focus {
    color: black;
    background: transparent;
    /* background-color: #F6F6F6; */
    border-color: #000;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
  }


  /* .custom-form input:focus {
    background-color: #fff;
    border: 2px solid #000 !important;
    padding: 20px;
    border-radius: 10px;
  } */
  
  .focused-input {
  border: 2px solid black;
  outline: none; /* This removes the default browser outline */
}
  .custom-form input:focus,
.custom-form textarea:focus {
	border: 2px solid #00d263;
}


  .block {
    display: block;
    width: 100%;
    border: none;
    cursor: pointer;
    text-align: center;
  }

  .custom-form:focus {
    border-color: inherit;
    -webkit-box-shadow: none;
    box-shadow: none;
  }
  .KvoMHf {
  border: none; /* Initial border style without any border */
}
</style>

<script>
  function addBorder(element) {
  element.classList.add('focused-input');
}

function removeBorder(element) {
  element.classList.remove('focused-input');
}

</script>