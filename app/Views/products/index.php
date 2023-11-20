<?= $this->extend('Layout/default') ?>
<?= $this->section('content') ?>
  <div class="content mb-5">
    <div class="wrap">
      <div class="page-headline-wrap cc-category-headline">
        <h1 class="section-heading primary-text">Tutti i Prodotti</h1>
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
            <p class="big-paragraph">Visualizza i prodotti inseriti</p>
          <!-- <#?php endif; ?> -->
      </div>
    </div>
  </div>

  <div class="container mt-4 mb-4">
    <div class="row justify-content-center mb-4">
      <?php if ($products) : ?>
        <?php foreach ($products as $product) : ?>
          <a style="text-decoration:none; color:black !important;" href="<?= site_url('product/detail/'.$product['id']) ?>">
            <div class="wrapper shadow mr-3 mb-3">
              <div class="container p-0">
              <div class="top"
                style="
                background: url('<?= !empty($product['image']) && file_exists('uploads/products/'.$product['image']) ? base_url('uploads/products/'.$product['image']) : base_url('public/img/yehorlisnyi210400016.jpg'); ?>') no-repeat center center;
                -webkit-background-size: 100%;
                -moz-background-size: 100%;
                -o-background-size: 100%;"
                >
                <!-- background-size: 100%;" -->
                </div>
                <div class="bottom">
                  <div class="left">
                    <div class="details pl-3 pt-2">
                      <?php if (strlen($product['name']) > 20) : ?>
                        <h5 class="card-title"><strong><?= (substr($product['name'], 0, 20).'...'); ?></strong></h5>
                      <?php else : ?>
                        <h5 class="card-title"><strong><?= $product['name']; ?></strong></h5>
                      <?php endif; ?>
                      <p>€<?= number_format($product['price'], 2, ',', ' '); ?></p>
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
              <?php if ($product['quantityAvailable'] < 1) : ?>
                <div class="inside">
                  <div class="icon"><i class="fa-solid fa-ban"></i></div>
                </div>
              <?php endif; ?>
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

    /* Style for the grid container */
    /* .grid-container {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-gap: 10px;
    }

    Style for each grid item
    .grid-item {
      position: relative;
      overflow: hidden;
    }

    .grid-item img {
      width: 100%;
      height: 100%;
      display: block;
      transition: transform 0.3s ease;
    }

    Overlay style
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.5);
      color: #fff;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    Show overlay on hover
    .grid-item:hover .overlay {
      opacity: 1;
    }

    Zoom effect on image hover
    .grid-item:hover img {
      transform: scale(1.1);
    }

    .out-of-stock-button {
      font-family: Raleway, sans-serif;
      font-size: 12px;
      line-height: 18px;
      font-weight: 700;
      font-style: normal;
      text-transform: uppercase;
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px;
      width: 25%;
      background: #FFFFC1;
      border: 1px solid;
    }

    .grid-item .out-of-stock-button {
      position: absolute;
      top: 0;
      left: 0;
      padding: 10px 10px;
      width: 25%;
    }
    .grid-item::before {
      content: '';
      background: white;
      position: absolute;
    } */
/* new */


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
    background: #a30c02;
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
      .contents{
        opacity: 1;
        transform: scale(1);
        transform: translateY(0);
      }
    }
    }
/* new */
  </style>
<?= $this->endSection() ?>

