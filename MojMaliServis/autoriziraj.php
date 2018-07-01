<?php
if(!isset($_POST["korisnik"])){
exit;
}

    if($_POST["korisnik"]===""){
        header("location: prijava.php?poruka=2");
        exit;
    }

    if(($_POST["korisnik"]==="tjakopec" && $_POST["lozinka"]==="t")
    ||
    ($_POST["korisnik"]==="edunova" && $_POST["lozinka"]==="e")
    ||
    ($_POST["korisnik"]==="1" && $_POST["lozinka"]==="1")
    ){
        //pusti dalje//
      session_start();
        $_SESSION["o"]= $_POST["korisnik"];
        header("location: nadzornaPloca.php");
    }else{
        header("location: prijava.php?poruka=1");
    }
