<link rel="stylesheet" type="text/css" href="<?= base_url('public/css/admin.css') ?>"/>
<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
  <div class="side-header">
      <!-- <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection">  -->
      <h5 style="margin-top:10px;">Benvenuto, Admin</h5>
  </div>

    <hr style="border:1px solid; background-color:#8a7b6d; border-color:#3B3131;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="<?= base_url();?>/admin/dashboard" ><i class="fa fa-home"></i> Dashboard</a>
    <a href="<?= base_url();?>/admin/users"  onclick="showCustomers()" ><i class="fa fa-users"></i> Utenti</a>
    <a href="<?= base_url();?>/admin/associations"   onclick="showCategory()" ><i class="fa fa-th-large"></i> Associazioni</a>
    <a href="<?= base_url();?>/admin/events"   onclick="showSizes()" ><i class="fa fa-th"></i> Eventi</a>
    <a href="<?= base_url();?>/admin/reports"   onclick="showProductSizes()" ><i class="fa fa-th-list"></i> Segnalazioni</a>    
    <a href="<?= base_url();?>/admin/products"   onclick="showProductItems()" ><i class="fa fa-th"></i> Prodotti</a>

  <!---->
</div>

<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-home"></i></button>
</div>

<script>
  function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";  
    document.getElementById("main-content").style.marginLeft = "250px";
    document.getElementById("main").style.display="none";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";  
    document.getElementById("main").style.display="block";  
  }
  </script>