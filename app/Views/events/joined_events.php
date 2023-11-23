<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Eventi a cui partecipi</h1>
        <p class="big-paragraph">Informazioni riguardo l'evento</p>
      </div>

      <div id="main-content" class="container allContent-section mt-5 py-4">
        <div>
          <?php if ($joinedEvents): ?>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th></th>
                  <th>Titolo</th>
                  <th>Luogo</th>
                  <th>Data</th>
                  <th>Azioni</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($joinedEvents as $event): ?>
                  <tr>
                    <td>
                      <?php if ($event['image']) : ?>
                        <img
                          src="<?= base_url('uploads/events/'.$event['image']); ?>"
                          data-src="<?= base_url('uploads/events/'.$event['image']); ?>"
                          alt="<?= $event['image']; ?>"
                          width='100'
                          height='100'
                        >
                      <?php else : ?>
                        <img
                        src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                        data-src="<?= base_url('public/img/yehorlisnyi210400016.jpg'); ?>"
                        alt="Immagine non caricata"
                        width='100'
                        height='100'
                        >
                      <?php endif; ?>
                    </td>
                    <td><?= $event['title'] ?></td>
                    <td><?= $event['location']; ?></td>
                    <td><?= date('d/m/y', strtotime($event['date'])); ?></td>
                    <td>
                      <a href="<?= site_url('event/detail/' . $event['id']) ?>" class="card-link"><i class="fa-solid fa-eye"></i></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <div class="row justify-content-center">
              <p>Nessuna evento presente</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection() ?>
