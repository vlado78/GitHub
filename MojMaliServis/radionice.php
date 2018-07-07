<?php
session_start();
if(!isset($_SESSION["o"])){
 header ("odjava.php");
}
?>

<!doctype html>
<html lang="en">

<head>
<?php include_once "predlozak/head.php" ?>
</head>

<body class="">
<?php include_once "predlozak/sidebar.php" ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <?php include_once "predlozak/navbar.php" ?>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->

          OVO JE PROSTOR  STRANICE
        </div>
      </div>
      <footer class="footer">
     
      <?php include_once "predlozak/footer.php" ?>
      </footer>
    </div>
  </div>
  
  <?php include_once "predlozak/skripte.php" ?>
</body>

</html>