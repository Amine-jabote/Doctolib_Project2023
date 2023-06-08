<!-- ----- début viewprabyspe.php ----- -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
        <?php
        include($root . '/app/view/fragment/fragmentCaveMenu.php');
        include($root . '/app/view/fragment/fragmentCaveJumbotron.html');
        ?>

        <h2>Liste des praticiens par spécialité</h2>
        
        <table class="table table-striped table-bordered">
  <thead>
    <tr>
      
    <th scope ="col">Identifiant du patient</th>
    <th scope="col">Nombre de praticiens</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($results as $prat) : 
    printf(
          "<tr>
            <td>%d</td>
            <td>%s</td>
          </tr>",
       $prat['patient_id'],
      $prat['nb_praticiens']
        );
  ?>
  <?php endforeach; ?>
</table>
    </div>
    <?php include($root . '/app/view/fragment/fragmentCaveFooter.html'); ?>
</body>
<!-- ----- fin viewprabyspe.php ----- -->


