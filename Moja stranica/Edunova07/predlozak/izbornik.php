<div class="title-bar" data-responsive-toggle="izbornik" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="izbornik"></button>
  <div class="title-bar-title"><?php echo $nazivAPP; ?></div>
</div>

<div class="top-bar" id="izbornik" <?php echo $bojaIzbornika ?>>
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <li class="menu-text"><a href="<?php echo $putanjaAPP; ?>index.php"><i class="fas fa-home" style="color: #2a6182;"></i></a></li>
      <li><a href="<?php echo $putanjaAPP; ?>privatno/nadzornaPloca.php">Nadzorna ploča</a></li>
      <li><a href="<?php echo $putanjaAPP; ?>onama.php">O nama</a></li>
      <li><a href="<?php echo $putanjaAPP; ?>kontakt.php">Kontakt</a></li>
      
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
    <li style="width:100%; text-align: center;"><a href="#">Prijava</a></li>
    </ul>
  </div>
</div>