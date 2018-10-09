


<div class="floated-label-wrapper">
<?php

if(!isset($greske["ime"])): ?>
  <label for="ime">Ime</label>
  <input  autocomplete="off" type="text" id="ime" name="ime" placeholder="Ime"
  value="<?php echo isset($_POST["ime"]) ? $_POST["ime"] : "" ?>">

<?php else:?>
<label class="is-invalid-label">
        Zahtjevani unos
        <input type="text" 
        value="<?php echo  $_POST["ime"]; ?>"
        class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
        aria-invalid="true" autocomplete="off" type="text" id="ime" name="ime" placeholder="Ime">
        <span class="form-error is-visible" id="nazivGreska">
        <?php echo $greske["ime"]; ?>
        </span>
        </label>

        <?php endif;?> 
</div>


<div class="floated-label-wrapper">
<?php if(!isset($greske["prezime"])): ?>
  <label for="prezime">Prezime</label>
  <input  autocomplete="off" type="text" id="prezime" name="prezime" placeholder="Prezime" 
  value="<?php echo isset($_POST["prezime"]) ? $_POST["prezime"] : "" ?>">

<?php else:?>

 <label class="is-invalid-label">
        Zahtjevani unos
        <input type="text" 
        value="<?php echo  $_POST["prezime"]; ?>"
        class="is-invalid-input" aria-describedby="nazivGreska" data-invalid="" 
        aria-invalid="true" autocomplete="off" type="text" id="prezime" name="prezime" placeholder="Prezime">
        <span class="form-error is-visible" id="nazivGreska">
        <?php echo $greske["prezime"]; ?>
        </span>
        </label>

        <?php endif;?> 
</div>


<div class="floated-label-wrapper">
  <label for="ulica_i_broj">Ulica i broj</label>
  <input  autocomplete="off" type="text" id="ulica_i_broj" name="ulica_i_broj" placeholder="Ulica i broj" value="<?php echo isset($_POST["ulica_i_broj"]) ? $_POST["ulica_i_broj"] : "" ?>">
</div>

<div class="floated-label-wrapper">
  <label for="mjesto">Mjesto</label>
  <input  autocomplete="off" type="text" id="mjesto" name="mjesto" placeholder="Mjesto"  value="<?php echo isset($_POST["mjesto"]) ?  $_POST["mjesto"]: ""; ?>">
</div>

<div class="floated-label-wrapper">
  <label for="broj_mobitela">Broj mobitela</label>
  <input  autocomplete="off" type="text" id="broj_mobitela" name="broj_mobitela" placeholder="Broj mobitela" value="<?php echo isset($_POST["broj_mobitela"]) ?  $_POST["broj_mobitela"]: ""; ?>">
</div>

<div class="floated-label-wrapper">
  <label for="email">Email</label>
  <input  autocomplete="off"  type="text" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ?  $_POST["email"]: ""; ?>">
</div>

<div class="floated-label-wrapper">
  <label for="datum_rodjenja">Datum rođenja</label>
  <input  autocomplete="off" type="date"  id="datum_rodjenja" name="datum_rodjenja" placeholder="Datum rođenja"  value="<?php  echo (isset($_POST["datum_rodjenja"])) ?   date("Y-m-d",strtotime( $_POST["datum_rodjenja"]))  : "" ;  ?>">


</div>

<div class="floated-label-wrapper">
  <label for="oib">Oib</label>
  <input   autocomplete="off" type="text" id="oib" name="oib" placeholder="Oib"  value="<?php echo isset($_POST["oib"]) ?  $_POST["oib"]: ""; ?>">
</div>

<div class="floated-label-wrapper">
  <label for="napomena">Napomena</label>
  <textarea  autocomplete="off" type="text" id="napomena" name="napomena" placeholder="Napomena"  ><?php echo isset($_POST["napomena"]) ?  $_POST["napomena"]: ""; ?></textarea>
</div>
