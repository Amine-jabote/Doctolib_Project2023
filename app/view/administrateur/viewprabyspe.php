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
      
    <th scope="col">Nom</th>
    <th scope ="col">Prénom</th>
    <th scope ="col">Adresse</th>
    <th scope="col">Spécialité</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($results as $praticien) : 
    printf(
          "<tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            
          </tr>",
       $praticien['nom'],
      $praticien['prenom'],
      $praticien['adresse'],
      $praticien['specialite']
        );
  ?>
  <?php endforeach; ?>
</table>
    </div>
    <?php include($root . '/app/view/fragment/fragmentCaveFooter.html'); ?>
</body>
<!-- ----- fin viewprabyspe.php ----- -->
