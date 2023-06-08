<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';

    ?>
  <div class="mt-4 p-5 bg-success text-white rounded">
  <h1>Annuler un RDV</h1>
  <p>Remplissez les champs ci-dessous :</p>

</div>



<form role="form" method='get' action='router2.php'>
    
  <div class="form-group mb-3">
  <input type="hidden" name='action' value=''>
  <input type="hidden" name='action' value='annulerRDVsuite'>

    <label for="date">Rendez-vous disponibles : </label> <select class="form-control" id='id_rdv' name='id_rdv' style="width: 200px">
      <?php
      
      print_r($crenaux);

      foreach ($crenaux as $crenau) {
        printf("<option value='%d'>%s</option>", $crenau['id'], $crenau['rdv_date']);
      }
      ?>
    </select>



  </div>

  <input type='submit' class="btn btn-success" value='Submit'>
            <input type='reset' class="btn btn-danger" value='Effacer'>
</form>

  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
