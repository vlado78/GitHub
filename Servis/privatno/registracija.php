<?php include_once "../../konfiguracija.php" ;
if(!isset($_SESSION[$idAPP."o"])){
  header("location: " . $putanjaAPP . "index.php");
}


if($_POST["korisnik"]===""){  
    header("location: registracijaNovog.php?poruka=1");
    exit;
}

if($_POST["lozinka"]===""){  
    header("location: registracijaNovog.php?poruka=1");
    exit;
}

if($_POST["plozinka"]===""){  
    header("location: registracijaNovog.php?poruka=1");
    exit;
}

if($_POST["lozinka"]!=$_POST["plozinka"]){  
    header("location: registracijaNovog.php?poruka=2");
    exit;
}


$izraz=$veza->prepare("insert into korisnici (korisnik,lozinka)
values (:korisnik,:lozinka)
");
$izraz->execute(array(
"korisnik"=>$_POST["korisnik"],

"lozinka"=>password_hash($_POST["lozinka"],PASSWORD_BCRYPT,array("cost"=>12))


));
        
         

  
  $izraz->execute();

  header("location: registracijaNovog.php?poruka=3");





 
  
 




  

     