<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Dettagli evento</h1>
        <p class="big-paragraph">Informazioni riguardo l'evento</p>

        <!-- <#?php if (session()->get('isPlatformManager')): ?>
          <div class="row">
            <div class="col">
              <div class="text-center">
                <a href="<#?= site_url('events/edit/'.$event['id']) ?>"
                  class="btn btn-md btn-clean btn-c-4129 btn-rd">
                    Modifica
                </a>
              </div>
            </div>
          </div>
        <#?php endif; ?> -->
      </div>
    </div><!-- end wrap -->

    <div class="row d-flex align-items-stretch">
      <div class="col-md-6 offset-lg-2">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <div class="card-body">
          <?php if ($event['image']): ?>
              <picture>
                <img src="<?php echo base_url('uploads/events/'.$event['image']); ?>"
                  data-src="<?php echo base_url('uploads/events/'.$event['image']); ?>"
                  class="img-fluid mb-5 center card-img-top"
                  alt="<?php echo $event['image']; ?>" width="350" height="350">
              </picture>
            <?php endif; ?>

            <p style='color: #e79999;text-transform: uppercase;'>
              <strong><?= formatDateItalian($event['date']); ?></strong>
            </p>

            <h3 class="my-3" style='color: #e79999'><strong><?= $event['title']; ?></strong></h3>
            <p><?= $event['description']; ?></p>
            <p><strong>Associazione:</strong> <?= $association['name']; ?></p>
            <p><strong>Luogo:</strong> <?= $event['location']; ?></p>
            <p><strong>Categoria:</strong> <?= $event['category']; ?></p>
            <p><strong>Inizio:</strong> <?= formatDateItalian($event['date']) ?> <?=$time?></p>
            <?php if ($event['date_to']): ?>
              <p><strong>Fine:</strong> <?= formatDateItalian($event['date_to']) ?> <?=$timeTo?></p>
            <?php endif; ?>
            <p>
              <?php if ($event['link']): ?>
                Per saperne di più su <strong><?= $event['title']; ?></strong> clicca sul seguente
                <a href="<?= ($event['link'])?>" target="_blank">LINK</a>
              <?php endif; ?>
            </p>

            <?php if (session()->get('isPlatformManager') && $association['id'] == session()->get('id')): ?>
              <div class="row">
                <div class="col-2">
                  <form action="<?= site_url('events/delete/' . $event['id']) ?>" method="post" id="form_<?= $event['id'] ?>">
                    <button class='btn btn-danger' type="button" data-toggle="modal" data-target="#confirmationModal">Rimuovi</button>
                  </form>

                  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="confirmationModalLabel">Conferma Eliminazione</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Sei sicuro di voler rimuovere l'evento?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                          <button
                            type="button"
                            class="btn btn-danger"
                            onclick="deleteRow(<?= $event['id'] ?>)"
                            id="confirmDelete<?= $event['id'] ?>">Rimuovi</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-2 ml-0 pl-0">
                  <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                  <a href="<?= site_url('events/edit/'.$event['id']) ?>"
                    class="btn btn-warning text-white">
                      Modifica
                  </a>
                </div>
              </div>

            <?php endif; ?>
          </div>
        </div>

        <!-- start feedback -->
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <h4 class="card-title mb-3"><strong>Recensioni</strong>
              <?php if (!is_null($participantId) &&
                !session()->get('isPlatformManager') &&
                session()->get('isLoggedIn') &&
                !session()->get('isAdmin')): ?>

                <!-- Add data-toggle and data-target attributes for Bootstrap Modal -->
                <a href="#" data-toggle="modal" data-target="#feedbackModal"
                  class="btn btn-md btn-clean btn-c-4129  primary-btn"
                  style="float: right;">
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
                        <form method="post" data-form-type="blocs-form" novalidate="" action="<?= site_url('feedbacks/store/'.$participantId->id) ?>">
                          <!-- Your form fields for name, email, and message -->
                          <div class="rate" style="float:left">
                            <input type="radio" id="star5" name="rating" value="5" required />
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
                            <input
                              placeholder="Inserisci titolo"
                              class="form-control"
                              type="title"
                              name="title"
                              value="<?= set_value('title') ?>"
                              required
                            >
                          </div>

                          <div class="form-group">
                            <textarea required class='form-control' name="message" placeholder="Inserisci feedback..."></textarea>
                          </div>

                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                            <button class="btn btn-primary" type="submit">
                                Invia
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>

                  </div>
                </div>

              <?php endif; ?>
            </h4>

            <?php if (!empty($feedbackData)): ?>
              <?php foreach ($feedbackData as $participantId => $feedbacks): ?>
                <?php foreach ($feedbacks as $feedback): ?>
                  <div class="container">
                    <div class="row">
                      <div class="col-sm">
                        <div class="rate">
                          <p><?php for ($i = 1; $i <= 5; $i++): ?>
                              <?php if ($i <= $feedback['rating']): ?>
                                  <i class="fas fa-star" style="color:#c59b08;"></i>
                              <?php else: ?>
                                  <i class="far fa-star"></i>
                              <?php endif; ?>
                          <?php endfor; ?>&nbsp;&nbsp; Recensito da <?= retrieveUserFromFeedback($feedback['user_id'])->first_name ?> il <?= formatDateItalian($feedback['created_at']); ?></p>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm">
                        <h5><strong><?= $feedback['title'] ?></strong></h5>
                        <p> <?= $feedback['message']; ?></p>
                        <?php if (session()->get('isPlatformManager') && ($userId == session()->get('id'))): ?>
                          <form action="<?= site_url('feedback/delete/' . $feedback['id']) ?>" method="post" id="form_<?= $feedback['id'] ?>">
                            <input
                              type="hidden"
                              name="event_id"
                              id="event_id"
                              value="<?= $event['id'] ?>">
                            <button
                              class='btn btn-danger'
                              type="button"
                              data-toggle="modal"
                              data-target="#removeFeedbackModal">Rimuovi</button>
                          </form>

                          <div class="modal fade" id="removeFeedbackModal" tabindex="-1" role="dialog" aria-labelledby="removeFeedbackModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="removeFeedbackModalLabel">Conferma Eliminazione</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  Sei sicuro di voler rimuovere il feedback?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                  <button
                                    type="button"
                                    class="btn btn-danger"
                                    onclick="deleteRow(<?= $feedback['id'] ?>)" id="confirmDelete<?= $feedback['id'] ?>">
                                    Rimuovi
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <hr>
                <?php endforeach; ?>
              <?php endforeach; ?>
            <?php else: ?>
              Nessun feedback inserito
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- start news -->
      <div class="col-md-3 col-sm-6">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded">
          <div class="card-body">
            <?php if (empty($participantModel) &&
              !session()->get('isPlatformManager') &&
              !session()->get('isAdmin')): ?>
              <h4 class="card-title mb-3">Prenotazione
                <form method="post" style='float: right' action="<?= site_url('participants/create') ?>">
                  <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                  <button type="submit" class="btn btn-sm btn-clean btn-c-4129 btn-rd primary-btn" >Partecipa</button>
                </form>
              </h4>
              <?php elseif(session()->get('isPlatformManager')): ?>
                <h4 class="card-title mb-3">Partecipanti
                  <span style='float: right'><?= count($participants)?></span>
                </h4>
              <?php elseif($participantModel): ?>
                <h4 class="card-title mb-3">Prenotazione</h4>
            <?php endif; ?>
            <hr>

            <div class="container mt-4 mb-4">
              <div class="row justify-content-center">
                <?php if ($participants && session()->get('isPlatformManager')) : ?>
                  <?php foreach ($participants as $participant): ?>
                    <div class="col-12 mb-3">
                      <div class="d-flex justify-content-between">
                        <?php if (isset($participant['user_info']) && $participant['user_info']): ?>
                          <ul class='pl-2'>
                            <li><p class="mb-0"><strong>Username:</strong> <?= $participant['user_info']['first_name']; ?></p>
                            <p class="mb-0"><strong>Email:</strong> <?= $participant['user_info']['email']; ?></p></li>
                          </ul>
                          <?php if ($participant['user_info']['id'] == session()->get('id')): ?>
                            <form action="<?= site_url('participant/delete/' . $event['id']) ?>" method="post" id="formParticipant_<?= $event['id'] ?>">
                              <button class="btn btn-sm btn-danger ml-0" type="button" data-toggle="modal" data-target="#deleteParticipant<?= $event['id'] ?>">
                                <i class="fa-solid fa-trash"></i>
                              </button>
                            </form>

                            <!-- Bootstrap Modal -->
                            <div class="modal fade" id="deleteParticipant<?= $event['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteParticipantLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="deleteParticipantLabel">Conferma Eliminazione</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>
                                  <div class="modal-body">
                                      Sei sicuro di voler rimuovere la prenotazione?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                    <button type="button" class="btn btn-danger" onclick="deleteParticipant(<?= $event['id'] ?>)" id="deleteParticipant<?= $event['id'] ?>">
                                        Rimuovi
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php endif; ?>
                        <?php endif; ?>
                      </div>
                    </div>

                    <hr>
                  <?php endforeach; ?>
                <?php elseif(!session()->get('isPlatformManager')): ?>
                  <div class="col-12">
                    <div class="d-flex justify-content-between">
                      <?php if ($participants): ?>
                        <?php foreach ($participants as $participant): ?>
                          <?php if ($participant['user_info']['id'] == session()->get('id')): ?>
                            <?php if (isset($participant['user_info']) && $participant['user_info']): ?>
                              <ul class='pl-2'>
                                <li><p class="mb-0"><strong>Username:</strong> <?= $participant['user_info']['first_name']; ?></p>
                                <p class="mb-0"><strong>Email:</strong> <?= $participant['user_info']['email']; ?></p></li>
                              </ul>

                              <form action="<?= site_url('participant/delete/' . $event['id']) ?>" method="post" id="formParticipant_<?= $event['id'] ?>">
                                <button class="btn btn-sm btn-danger ml-0" type="button" data-toggle="modal" data-target="#deleteParticipant<?= $event['id'] ?>">
                                  <i class="fa-solid fa-trash"></i>
                                </button>
                              </form>

                              <!-- Bootstrap Modal -->
                              <div class="modal fade" id="deleteParticipant<?= $event['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteParticipantLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteParticipantLabel">Conferma Eliminazione</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler rimuovere la prenotazione?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                                      <button type="button" class="btn btn-danger" onclick="deleteParticipant(<?= $event['id'] ?>)" id="deleteParticipant<?= $event['id'] ?>">
                                          Rimuovi
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php else : ?>
                          <p>Aggiungi prenotazione.</p>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php else : ?>
                  <p>Nessun partecipante.</p>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- end news  -->
    </div>
  </div>

  <style>

    .rate {
        /* float: left; */
        height: 46px;
        /* padding: 0 10px; */
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

  <script>
    function deleteRow(id) {
      // Construct the form ID based on the user ID
      var formId = 'form_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

    function deleteParticipant(id) {
      // Construct the form ID based on the user ID
      var formId = 'formParticipant_' + id;

      // Submit the form with the constructed ID
      document.getElementById(formId).submit();
    }

  </script>
<?= $this->endSection() ?>
