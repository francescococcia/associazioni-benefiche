<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>

  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Eventi</h1>
        <!-- <#?php if(session()->get('isPlatformManager')): ?>
          <p class="big-paragraph">Visualizza gli eventi inseriti</p>
          <div class="row">
            <div class="col">
              <a
                class="btn btn-clean btn-c-4129 btn-rd"
                href="<#?php echo base_url();?>/events/new">Inserisci evento</a>
            </div>
          </div>
          <#?php else: ?> -->
            <p class="big-paragraph">Visualizza o gestisci gli eventi della tua associazione</p>
          <!-- <#?php endif; ?> -->
          <div class="align-self-center col-lg-8 offset-lg-2 text-lg-end text-center">
              <a href="<?php echo base_url();?>/events/new" class="btn btn-d btn-rd box-btn primary-btn float-lg-none fill-mob-btn">Crea nuovo evento</a>
            </div>
      </div>
      <div class="text-center text-md-start col-md-12 align-self-center ps-0 pe-0 ps-sm-2 pe-sm-2 mb-3 mb-md-4 text-lg-center col-lg-12">

      <a href="<?php echo base_url('/events-manager?category=Feste e sagre'); ?>" class="a-btn text-lg-left mt-lg-3 token-link <?= ($category == 'Feste e sagre') ? 'active' : ''; ?>">Feste e sagre</a>
            <a href="<?php echo base_url('/events-manager?category=Mercatini'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Mercatini') ? 'active' : ''; ?>">Mercatini</a>
            <a href="<?php echo base_url('/events-manager?category=Sport'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Sport') ? 'active' : ''; ?>">Sport</a>
            <a href="<?php echo base_url('/events-manager?category=Cucina'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Cucina') ? 'active' : ''; ?>">Cucina</a>
            <a href="<?php echo base_url('/events-manager?category=Ambiente'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Ambiente') ? 'active' : ''; ?>">Ambiente</a>
            <a href="<?php echo base_url('/events-manager?category=Altro'); ?>" class="a-btn text-lg-left token-link <?= ($category == 'Altro') ? 'active' : ''; ?>">Altro</a>
            <a href="<?php echo base_url('/events-manager?category='); ?>" class="a-btn text-lg-left token-link">Annulla</a>
      </div>

    </div>
  </div>

  <div class="container mt-4 mb-4">
    <div class="row justify-content-center mb-4">
      <?php if ($events) : ?>
        <?php foreach ($events as $event) : ?>
          <a style="text-decoration:none; color:black !important;" href="<?= site_url('event/detail/'.$event['id']) ?>">
            <div class="wrapper shadow mr-3 mb-3">
              <div class="container p-0">
              <div class="top"
                style="
                background: url('<?= !empty($event['image']) && file_exists('uploads/events/'.$event['image']) ? base_url('uploads/events/'.$event['image']) : base_url('public/img/yehorlisnyi210400016.jpg'); ?>') no-repeat center center;
                -webkit-background-size: 100%;
                -moz-background-size: 100%;
                -o-background-size: 100%;"
                >
                <!-- background-size: 100%;" -->
                </div>
                <div class="bottom">
                  <div class="left">
                    <div class="details pl-3 pt-2">
                      <p class="card-text" style='font-weight: bold;'><?= formatDateItalian($event['date']); ?></p>
                      <?php if (strlen($event['title']) > 20) : ?>
                        <h5 class="card-title">
                          <strong><?= (substr($event['title'], 0, 20).'...'); ?></strong>
                        </h5>
                      <?php else : ?>
                        <h5 class="card-title">
                          <strong><?= $event['title']; ?></strong>
                        </h5>
                      <?php endif; ?>
                      <!-- <p><#?= $event['category'] ?></p> -->
                    </div>
                    <!-- <div class="buy"><i class="fa-solid fa-shopping-cart"></i></div> -->
                  </div>
                  <!-- <div class="right">
                    <div class="done"><i class="material-icons">done</i></div>
                    <div class="details">
                      <h1>Chair</h1>
                      <p>Added to your cart</p>
                    </div>
                    <div class="remove"><i class="material-icons">clear</i></div>
                  </div> -->
                </div>
              </div>
            </div>
          </a>
          <?php endforeach; ?>
        <?php else : ?>
          <p>Nessun prodotto inserito.</p>
        <?php endif; ?>
    </div>
    <?php if ($pager) : ?>
      <?= $pager->links() ?>
    <?php endif; ?>
  </div>

  <style>
    a, a:focus, a:active {
    text-decoration: none;
    color: inherit;
    }
    a:hover {
      color: #e79999
    }
    .card-img {
        width: 100%; /* Adjust the width to fit the card */
        height: 250px; /* Define a fixed height for uniformity */
        object-fit: cover; /* Crop the image to cover the container */
    }
    /* event */

    .post_image {
  position: relative;
  background-color: #e79999;
}

.image {
  opacity: 1;
  display: block;
  width: 100%;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.post_image:hover .image {
  opacity: 0.3;
}

.post_image:hover .middle {
  opacity: 1;
}

.text {
  color: white;
  font-size: 25px;
  padding: 16px 32px;
}
    /* endevent */
    .token-link:hover,
    .token-link.active {
        background-color: #ff8300;
        font-weight: bold;
    }

    /* html, body{
  background: #E3E3D8;
  font-family: sans-serif;
  padding: 25px;
} */

  .wrapper{
    width: 300px;
    height: 350px;
    background: white;
    margin: auto;
    position: relative;
    overflow: hidden;
    border-radius: 10px 10px 10px 10px;
    box-shadow: 0;
    transform: scale(0.95);
    transition: box-shadow 0.5s, transform 0.5s;
    &:hover{
      transform: scale(1);
      box-shadow: 5px 20px 30px rgba(0,0,0,0.2);
    }
    
    .container{
      width:100%;
      height:100%;
      .top{
        height: 70%;
        width:100%;
        background: url(https://s-media-cache-ak0.pinimg.com/736x/49/80/6f/49806f3f1c7483093855ebca1b8ae2c4.jpg) no-repeat center center; 
    -webkit-background-size: 100%;
    -moz-background-size: 100%;
    -o-background-size: 100%;
    background-size: 100%;
      }
      .bottom{
        width: 200%;
        height: 20%;
        transition: transform 0.5s;
        &.clicked{
          transform: translateX(-50%);
        }
        h1{
            margin:0;
            padding:0;
        }
        p{
            margin:0;
            padding:0;
        }
        .left{
          height:100%;
          width: 50%;
          background: #f4f4f4;
          position:relative;
          float:left;
          .details{
            padding: 20px;
            float: left;
            width: calc(70% - 40px);
          }
          .buy{
            float:right;
            width: calc(30% - 2px);
            height:100%;
            background: #f1f1f1;
            transition: background 0.5s;
            border-left:solid thin rgba(0,0,0,0.1);
            i{
              font-size:30px;
              padding:30px;
              color: #254053;
              transition: transform 0.5s;
            }
            &:hover{
              background: #A6CDDE;
            }
            &:hover i{
              transform: translateY(5px);
              color:#00394B;
            }
          }
        }
        .right{
          width: 50%;
          background: #A6CDDE;
          color: white;
          float:right;
          height:200%;
          overflow: hidden;
          .details{
            padding: 20px;
            float: right;
            width: calc(70% - 40px);
          }
          .done{
            width: calc(30% - 2px);
            float:left;
            transition: transform 0.5s;
            border-right:solid thin rgba(255,255,255,0.3);
            height:50%;
            i{
              font-size:30px;
              padding:30px;
              color: white;
            }
          }
          .remove{
            width: calc(30% - 1px);
            clear: both;
            border-right:solid thin rgba(255,255,255,0.3);
            height:50%;
            background: #BC3B59;
            transition: transform 0.5s, background 0.5s;
            &:hover{
              background: #9B2847;
            }
            &:hover i{
              transform: translateY(5px);
            }
            i{
              transition: transform 0.5s;
              font-size:30px;
              padding:30px;
              color: white;
            }
          }
          &:hover{
            .remove, .done{
              transform: translateY(-100%);
            }
          }
        }
      }
    }
    
    .inside{
      z-index:9;
      background: #92879B;
      width:140px;
      height:140px;
      position: absolute;
      top: -70px;
      right: -70px;
      border-radius: 0px 0px 200px 200px;
      transition: all 0.5s, border-radius 2s, top 1s;
      overflow: hidden;
      .icon{
        position:absolute;
        right:85px;
        top:85px;
        color:white;
        opacity: 1;
      }
      &:hover{
        width:100%;
        right:0;
        top:0;
        border-radius: 0;
        height:80%;
        .icon{
          opacity: 0;
          right:15px;
          top:15px;
        }
        .contents{
          opacity: 1;
          transform: scale(1);
          transform: translateY(0);
        }
      }
      .contents{
        padding: 5%;
        opacity: 0;
        transform: scale(0.5);
        transform: translateY(-200%);
        transition: opacity 0.2s, transform 0.8s;
        table{
          text-align:left;
          width:100%;
        }
        h1, p, table{
          color: white;
        }
        p{
          font-size:13px;
        }
      }
    }
  }
  </style>

<?= $this->endSection() ?>
