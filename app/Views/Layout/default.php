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

      /* image */
      .input_container {
        border: 1px solid #e5e5e5;
      }

      input[type=file]::file-selector-button {
        background-color: #fff;
        color: #000;
        border: 0px;
        border-right: 1px solid #e5e5e5;
        padding: 10px 15px;
        margin-right: 20px;
        transition: .5s;
      }

      input[type=file]::file-selector-button:hover {
        background-color: #eee;
        border: 0px;
        border-right: 1px solid #e5e5e5;
      }

      .icon-container {
      display: inline-block;
      position: relative;
      }

      .count {
        position: absolute;
        top: -10px; /* Adjust this value to position the count number */
        right: -10px; /* Adjust this value to position the count number */
        background-color: red; /* Change the background color as needed */
        color: white; /* Change the text color as needed */
        border-radius: 50%; /* Makes it a circle */
        padding: 6px 10px; /* Adjust padding as needed for your count size */
        font-size: 14px; /* Adjust the font size as needed */
      }

      .navbar-brand {
        font-weight: bold;
        text-transform: uppercase;
      }
      .navbar-light .navbar-nav .nav-link{
        font-weight: bold;
        text-transform: uppercase;
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
      <footer id="footer" style="background-color: #FFFFC1;">
      <!-- <footer id="footer" style="color: #ffffff; background-color: #ffffc1;"> -->
        <?= $this->include('Layout/partial/footer'); ?>
      </footer>
    </div>

    <!-- Main container END -->

    <?= $this->include('Layout/partial/import_js'); ?>
  </body>
</html>
