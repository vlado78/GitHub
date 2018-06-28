<div class="title-bar" data-responsive-toggle="izbornik" data-hide-for="medium">
  <button class="menu-icon" type="button" data-toggle="izbornik"></button>
  <div class="title-bar-title"><?php echo $nazivAPP; ?></div>
</div>

<div class="top-bar" id="izbornik" <?php echo $bojaIzbornika ?>>
  <div class="top-bar-left">
    <ul class="dropdown menu" data-dropdown-menu>
      <?php 
      stavkaIzbornika($putanjaAPP,"index.php","<i class=\"fas fa-home\" style=\"color: #2a6182;\"></i>");
      if(isset($_SESSION["o"])):
        stavkaIzbornika($putanjaAPP,"privatno/nadzornaPloca.php","Nadzorna ploča");
      endif;
      stavkaIzbornika($putanjaAPP,"onama.php","O nama");
        stavkaIzbornika($putanjaAPP,"kontakt.php","Kontakt");
      
      
      
      ?>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu">
    <?php if(isset($_SESSION["o"])): ?>
      <li style="width:100%; text-align: center;"><a href="<?php echo $putanjaAPP; ?>odjava.php">Odjava</a></li>
    <?php else:?>
      <li style="width:100%; text-align: center;"><a href="<?php echo $putanjaAPP; ?>prijava.php">Prijava</a></li>
    <?php endif?>
    </ul>
  </div>
</div>