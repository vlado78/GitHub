<?php



function stavkaIzbornika($putanjaAPP, $stranica, $labela){
        ?>
        <li<?php 
        if ($putanjaAPP . $stranica == $_SERVER["PHP_SELF"]){
          echo " class=\"active\"";
        }
        ?>><a href="<?php echo $putanjaAPP . $stranica; ?>"><?php echo $labela;  ?></i></a></li>
        <?php
}