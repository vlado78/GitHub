<nav class="top-bar topbar-responsive" id="javno">

  <div class="top-bar-title" >
    <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
      <button class="menu-icon" id="javno" type="button" data-toggle></button>
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
      <?php
            stavkaIzbornika($putanjaAPP,"kontakt.php","Kontakt");
            stavkaIzbornika($putanjaAPP,"index.php","Naslovnica");
            stavkaIzbornika($putanjaAPP,"onama.php","O nama");
          
       
        ?>

        <?php if(isset( $_SESSION[$idAPP."o"])): 
          stavkaIzbornika($putanjaAPP,"odjava.php","Odjavi se");
          
       else:
          
          stavkaIzbornika($putanjaAPP,"prijava.php","Prijavi se");
         endif?>
      </ul>
    </div>
  </div>
</nav>

<br>
<?php if(isset( $_SESSION[$idAPP."o"])): ?>
  <nav class="top-bar topbar-responsive" id="privatno">

    <div class="top-bar-title">
      <span data-responsive-toggle="topbar-responsive" data-hide-for="medium">
        <button class="menu-icon"   id="privatno" type="button" data-toggle></button>
      </span>
    </div>

      <div id="topbar-responsive" class="topbar-responsive-links">
        <div class="top-bar-right">
          <ul class="menu simple vertical medium-horizontal">
          <li><a href="https://github.com/vlado78/GitHub/tree/master/Servis" target="_blank">GitHub</a></li> 
            <?php
            stavkaIzbornika($putanjaAPP,"privatno/nadzornaPloca.php","Nadzorna ploča");
            //stavkaIzbornika($putanjaAPP,"privatno/PDO.php","PDO");
            stavkaIzbornika($putanjaAPP,"privatno/eraDiagram.php","ERA diagram");
            stavkaIzbornika($putanjaAPP,"privatno/radionice/index.php","Radionice");
            stavkaIzbornika($putanjaAPP,"privatno/vlasnik/index.php","Vlasnik");
            stavkaIzbornika($putanjaAPP,"privatno/vozilo/index.php","Vozilo");
            stavkaIzbornika($putanjaAPP,"privatno/radni_nalog/index.php","Radni nalog");
            stavkaIzbornika($putanjaAPP,"privatno/zaposlenik/index.php","Zaposlenici");
            ?>
            
            </ul>
        </div>
      </div>
    </nav>
   

    <?php endif?>

  