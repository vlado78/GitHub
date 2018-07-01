<div class="sidebar" data-color="azure" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
  <div class="logo">
    <a href="index.php" class="simple-text logo-normal"> <!--UPISATI UMJESTO # LINK-->
      Moj logo ovdje
    </a>
  </div>

      <!--OVO JE POČETAK SIDEBARA-->
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item active  ">
        <a class="nav-link" href="index.php">
          <i class="material-icons">home</i>
          <p>Naslovnica</p>
        </a>
      </li>

      <li class="nav-item active  ">
        <a class="nav-link" href="radionice.php">
          <i class="material-icons">build</i>
          <p>Radionice</p>
        </a>
      </li>

      <li class="nav-item active  ">
        <a class="nav-link" href="onama.php">
          <i class="material-icons">face</i>
          <p>O nama</p>
        </a>
      </li>

      <li class="nav-item active  ">
        <a class="nav-link" href="kontakt.php">
          <i class="material-icons">phone</i>
          <p>Kontakt</p>
        </a>
      </li>

      <?php if(isset($_SESSION["o"])): ?>

        <li class="nav-item active  ">
          <a class="nav-link" href="prijava.php">
            <i class="material-icons">fingerprint</i>
            <p>Prijavi se</p>
          </a>
        </li>

      <?php else:?>

        <li class="nav-item active  ">
          <a class="nav-link" href="odjava.php">
            <i class="material-icons">eject</i>
            <p>Odjavi se</p>
          </a>
        </li>

      <?php endif?>

    </ul>
  </div>


</div>