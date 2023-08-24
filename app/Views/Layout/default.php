<!doctype html>
<html>
  <head>
    <?= $this->include('Layout/partial/head'); ?>
    <title>Register</title>
    <style>
      body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        background-color: #f8f8f8; /* Set the background color to gray */
      }

      .page-container {
        flex: 1; /* Take up remaining vertical space */
        display: flex;
        flex-direction: column;
      }

      footer {
        margin-top: auto; /* Attach footer to the bottom */
      }

      .wrap {
        position: relative;
        display: block;
        width: 940px;
        margin-right: auto;
        margin-left: auto;
      }
      .page-headline-wrap {
        display: block;
        width: 70%;
        margin: 50px auto;
        text-align: center;
      }
      .page-headline-wrap.cc-category-headline {
        display: block;
        width: 60%;
        margin-right: auto;
        margin-bottom: 40px;
        margin-left: auto;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: start;
        -webkit-align-items: flex-start;
        -ms-flex-align: start;
        align-items: flex-start;
        text-align: center;
      }
    </style>
  </head>
  <body>

    <!-- Main container -->

    <div class="page-container">
      <?= $this->include('Layout/partial/navbar'); ?>
      <div id="content-wrap">
        <?= $this->include('Layout/partial/messages'); ?>
        <?= $this->renderSection('content') ?>
      </div>
      <footer id="footer" style="color: #ffffff; background-color: #333333;">
        <?= $this->include('Layout/partial/footer'); ?>
      </footer>
    </div>

    <!-- Main container END -->

    <?= $this->include('Layout/partial/import_js'); ?>
  </body>
</html>
