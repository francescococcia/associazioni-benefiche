<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1>Dettagli evento</h1>
        <p class="big-paragraph">Informazioni riguardo l'evento</p>
        <?php if (!empty($participantModel) && !session()->get('isPlatformManager')): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                <a href="#" data-toggle="modal" data-target="#feedbackModal"
                  class="btn btn-md btn-clean btn-c-4129 btn-rd">
                    Invia un feedback
                </a>

                <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Invia un feedback</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <!-- Modal Body -->
                      <div class="modal-body">
                        <!-- Place your feedback form or content here -->
                        <form method="post" action="<?= site_url('feedbacks/store/'.$participantId->id) ?>">
                          <!-- Your form fields for name, email, and message -->
                          <div class="rate" style="float:left">
                            <input type="radio" id="star5" name="rating" value="5" />
                            <label for="star5" title="Eccezionale">5 stars</label>
                            <input type="radio" id="star4" name="rating" value="4" />
                            <label for="star4" title="Eccellente">4 stars</label>
                            <input type="radio" id="star3" name="rating" value="3" />
                            <label for="star3" title="Molto bene">3 stars</label>
                            <input type="radio" id="star2" name="rating" value="2" />
                            <label for="star2" title="Bene">2 stars</label>
                            <input type="radio" id="star1" name="rating" value="1" />
                            <label for="star1" title="Giusto">1 star</label>
                          </div>

                          <div class="form-group">
                            <textarea class='form-control' name="message" placeholder="Report Message"></textarea>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Chiudi</button>
                            <button class="btn btn-primary" type="submit">
                                Invia
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>

      <div class="row">
        <div class="col-12 m-5">
          <div class="card">
            <div class="card-body">
              <p><strong>Title:</strong> <?= $event['title']; ?></p>
              <p><strong>Descrizione:</strong> <?= $event['description']; ?></p>
              <p><strong>Date:</strong> <?= $event['date']; ?></p>
              <p><strong>Location:</strong> <?= $event['location']; ?></p>
              <?php if (empty($participantModel) && !session()->get('isPlatformManager')): ?>
              <form method="post" action="<?= site_url('participants/create') ?>">
                <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                <button type="submit" class="btn btn-clean btn-c-4129 btn-rd">Partecipa</button>
              </form>
            <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <?php if (!empty($feedbackData)): ?>
        <div class="row">
          <div class="col-12 m-5">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-3"><strong>Feedback per questo evento</strong></h5>
                <?php foreach ($feedbackData as $participantId => $feedbacks): ?>
                  <?php foreach ($feedbacks as $feedback): ?>
                    <p>Messaggio: <?= $feedback['message']; ?></p>
                    <div class="rate">
                      <?php for ($i = 1; $i <= 5; $i++): ?>
                          <?php if ($i <= $feedback['rating']): ?>
                              <i class="fas fa-star"></i>
                          <?php else: ?>
                              <i class="far fa-star"></i>
                          <?php endif; ?>
                      <?php endfor; ?>
                    </div>
                    <hr>
                  <?php endforeach; ?>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <style>

    .rate {
        /* float: left; */
        height: 46px;
        padding: 0 10px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;    
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;  
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }
  </style>
<?= $this->endSection() ?>
