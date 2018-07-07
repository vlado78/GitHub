<!doctype html>
<html lang="en">

<head>
<?php include_once "predlozak/head.php" ?>
</head>

<body class="">
<div class="wrapper ">
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
              <div class="grid-x grid-padding-x">
                            <div class="large-4 cell text-center">
                              <form class="callout text-center" action="autoriziraj.php" method="post">
                                <h1>Prijava</h1>
                                <div class="floated-label-wrapper">
                                  <label for="korisnik">Korisnik</label>
                                  <input autocomplete="off" type="text" id="korisnik" name="korisnik" placeholder="korisnik">
                                </div>
                                <div class="floated-label-wrapper">
                                  <label for="lozinka">Lozinka</label>
                                  <input autocomplete="off" type="password" id="lozinka" name="lozinka" placeholder="lozinka">
                                </div>
                                <input class="button expanded" type="submit" value="Potvrdi">
                              </form>
                            </div>
                          </div>
            

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