<?php


function stavkaIzbornika($putanjaAPP, $stranica, $labela){
  ?>
  <li
  <?php 
  if ($putanjaAPP . $stranica == $_SERVER["PHP_SELF"]){
    echo " class=\"trenutno\"";
  }
  ?>><a href="<?php echo $putanjaAPP . $stranica; ?>"><?php echo $labela;  ?></i></a></li>
  <?php
}

function provjeri_OIB($oib){
  if(strlen($oib) == 11){
      if(is_numeric($oib)){
          $a = 10;
          for($i = 0; $i < 10; $i++){
              $a = $a + intval(substr($oib, $i, 1), 10);
              $a = $a % 10;
              if($a == 0){$a = 10;}
              $a *= 2;
              $a = $a % 11;
          }
          $control = 11 - $a;
          if($control == 10){$control = 0;}
          return $control == intval(substr($oib, 10, 1), 10);
      }else{
          return FALSE;
      }
  }else{
      return FALSE;   
  }
}
function CheckOIB($oib) {
	if ( strlen($oib) == 11 ) {	
		if ( is_numeric($oib) ) {
			$a = 10;
			for ($i = 0; $i < 10; $i++) {
				$a = $a + intval(substr($oib, $i, 1), 10);
				$a = $a % 10;
				
                if ( $a == 0 ) {
                     $a = 10;
                     }
				
				$a *= 2;
				$a = $a % 11;
			}
			
			$kontrolni = 11 - $a;
			
			if ( $kontrolni == 10 ) { $kontrolni = 0; }
			
			return $kontrolni == intval(substr($oib, 10, 1), 10);
			
		} else {
			return false;
		}
		
	} else {
		return false;	
	}
	
}
