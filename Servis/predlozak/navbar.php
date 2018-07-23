<nav class="top-bar topbar-responsive">

      <div class="top-bar-title">
        <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
          <button class="menu-icon" type="button" data-toggle></button>
        </span>
        <?php if(!isset( $_SESSION[$idAPP."o"])): ?>
        <a class="topbar-responsive-logo" href="#"><strong>Moj mali servis</strong></a>
        <?php else:?>
        <a class="topbar-responsive-logo" href="#"><strong>Dobrodošao </strong></a>
        <?php endif?>
      </div>

      <div id="topbar-responsive" class="topbar-responsive-links">
        <div class="top-bar-right">
          <ul class="menu simple vertical medium-horizontal">
            <li><a href="<?php echo $putanjaAPP; ?>index.php">Naslovnica</a></li>
            <li><a href="<?php echo $putanjaAPP; ?>onama.php">O nama</a></li>
            <li><a href="<?php echo $putanjaAPP; ?>kontakt.php">Kontakt</a></li>


            <?php if(isset( $_SESSION[$idAPP."o"])): ?>
              <li><a href="<?php echo $putanjaAPP; ?>odjava.php">Odjavi se</a></li>
            <?php else:?>
              <li><a href="<?php echo $putanjaAPP; ?>prijava.php">Prijavi se</a></li>
            <?php endif?>
            
           
          </ul>
        </div>
      </div>
    </nav>