<!doctype html>
<html>
  <head>
    <?= $this->include('Layout/partial/head'); ?>
    <title>Register</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
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

      .custom-file-upload{
        /* border-right: 1px solid #ccc;  */
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        margin-bottom:0;
      }

      .custom-file-upload:hover{
        background-color: bisque;
      }

      .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 60%;
      }
      
      /* CSS to style pagination links */

      /* Style for pagination links */
      ul.pagination {
          list-style-type: none;
          display: flex;
          justify-content: center;
          align-items: center;
          padding: 0;
      }

      ul.pagination li {
          display: inline;
          margin: 0 5px; /* Adjust margin as needed */
      }

      ul.pagination li a {
          padding: 5px 10px;
          text-decoration: none;
          border: 1px solid #ccc;
          border-radius: 3px;
          color: #333;
      }

      ul.pagination li.active a {
          background: #007bff; /* Adjust active link background color */
          color: #fff;
          border-color: #007bff;
      }
      
      .fixed-width-column {
        width: 15%;
      }
      
      .counter {
    position: absolute;
    bottom: 50px;
    left: 50%;
    transform: translateX(-50%);
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background-color: gray;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}


    </style>
    <?= $this->include('Layout/partial/import_js'); ?>
  </head>
  <body>

    <!-- Main container -->

    <div class="page-container">
      <?= $this->include('Layout/partial/navbar'); ?>
      <div id="content-wrap">
        <?= $this->include('Layout/partial/messages'); ?>
        <?= $this->renderSection('content') ?>
      </div>

      <?php if (!session()->get('isAdmin')): ?>
        <footer id="footer" style="background-color: #FFFFC1;">
          <?= $this->include('Layout/partial/footer'); ?>
        </footer>
      <?php endif; ?>
    </div>

    <!-- Main container END -->

  </body>
</html>
