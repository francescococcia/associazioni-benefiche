  <!-- ScrollToTop Button -->
  <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></a>
  <!-- ScrollToTop Button END-->

  <!-- bloc-7 -->
  <div class="bloc full-width-bloc b-parallax l-bloc" id="bloc-12">
    <div class="container bloc-lg bloc-sm-lg">
      <div class="row">
        <div class="col">
          <form class="contact-form" action="<?= site_url('reports/store') ?>" method="POST">  
            <div class="row">
              <div class="bento-box me-lg-5 ms-lg-5 col text-lg-start pt-lg-4 pb-lg-3 shadow">
                <div class="row">
                  <div class="col">
                    <h3 class="section-heading primary-text mb-3 mb-md-4 mt-lg-4">
                      Contattaci
                    </h3>
                    <h5 class="mb-4 h5-style">
                      manigenerosebari@gmail.com
                    </h5>
                  </div>
                    <div class="col">
                      <div class="form-group mb-3">
                        <label class="form-label label-style">
                          Nome
                        </label>
                        <input
                            type="text"
                            class="form-control custom-form"
                            id="name"
                            name="name"
                            placeholder="Inserisci il tuo nome"
                            required
                            value=""
                            aria-invalid="true">
                        <!-- <input class="form-control field-bloc-12-style"> -->
                      </div>
                      <div class="form-group mb-3">
                        <label class="form-label label-e-mail-style">
                          E-mail
                        </label>
                        <input type="email" class="form-control custom-form" id="email" name="email" placeholder="Inserisci la tua email" required>
                        <!-- <input class="form-control field-0-style"> -->
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group mb-3">
                        <label class="form-label label-messaggio-style">
                          Messaggio
                        </label>
                        <textarea
                          class="form-control custom-form mb-3"
                          id="message" name="message" rows="2"
                          placeholder="Scrivi qui il tuo messaggio..." required>
                        </textarea>
                        <!-- <input class="form-control field-style"> -->
                        <button class="bloc-button btn btn-d btn-rd mt-3 primary-btn box-btn fill-mob-btn mt-lg-2" type="submit">
                          Invia
                        </button>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- bloc-7 END -->
