<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
      
      
    <h2>Liste des Spécialités :</h2>
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">label</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Assurez-vous que la variable $results_specialite contient les données des spécialités
    if (isset($results_specialite) && is_array($results_specialite)) {
      foreach ($results_specialite as $specialite) {
        printf(
          "<tr>
            <td>%d</td>
            <td>%s</td>
          </tr>",
          $specialite['id'],
          $specialite['label']
        );
      }
    } else {
      echo "<tr><td colspan='6'>Aucune spécialité trouvée.</td></tr>";
    }
    ?>
  </tbody>
</table>

  
  <h2>Liste des Praticiens :</h2>
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">adresse</th>
      <th scope="col">statut</th>
      <th scope="col">specialite id</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Assurez-vous que la variable $results_praticien contient les données des praticiens
    if (isset($results_praticien) && is_array($results_praticien)) {
      foreach ($results_praticien as $praticien) {
        printf(
          "<tr>
            <td>%d</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%d</td>
            <td>%d</td>
          </tr>",
          $praticien['id'],
          $praticien['nom'],
          $praticien['prenom'],
          $praticien['adresse'],
          $praticien['statut'],
          $praticien['specialite_id']
        );
      }
    } else {
      echo "<tr><td colspan='6'>Aucun praticien trouvé.</td></tr>";
    }
    ?>
  </tbody>
</table>
  
  

<h2>Liste des Patients :</h2>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">adresse</th>
      <th scope="col">statut</th>
      <th scope="col">specialite id</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Assurez-vous que la variable $results_patient contient les données des patients
    if (isset($results_patient) && is_array($results_patient)) {
      foreach ($results_patient as $patient) {
        printf(
          "<tr>
            <td>%d</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%d</td>
            <td>%d</td>
          </tr>",
          $patient['id'],
          $patient['nom'],
          $patient['prenom'],
          $patient['adresse'],
          $patient['statut'],
          $patient['specialite_id']
        );
      }
    } else {
      echo "<tr><td colspan='6'>Aucun patient trouvé.</td></tr>";
    }
    ?>

  </tbody>
</table>

<h2>Liste des administrateurs :</h2>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">adresse</th>
      <th scope="col">statut</th>
      <th scope="col">specialite id</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
    // Assurez-vous que la variable $results_admin contient les données des administrateurs
    if (isset($results_administrateur) && is_array($results_administrateur)) {
      foreach ($results_administrateur as $admin) {
        printf(
          "<tr>
            <td>%d</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%d</td>
            <td>%d</td>
          </tr>",
          $admin['id'],
          $admin['nom'],
          $admin['prenom'],
          $admin['adresse'],
          $admin['statut'],
          $admin['specialite_id']
        );
      }
    } else {
      echo "<tr><td colspan='6'>Aucun administrateur trouvé.</td></tr>";
    }
    ?>

  </tbody>
</table>


    <h2>Liste de tous les Rendez-vous :</h2>
  <table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">patient_id</th>
      <th scope="col">praticien_id</th>
      <th scope="col">rdv_date</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Assurez-vous que la variable $results_specialite contient les données des spécialités
    if (isset($results_rendezvous) && is_array($results_rendezvous)) {
      foreach ($results_rendezvous as $rdv) {
        printf(
          "<tr>
            <td>%d</td>
            <td>%d</td>
            <td>%d</td>
            <td>%s</td>
          </tr>",
          $rdv['id'],
          $rdv['patient_id'],
          $rdv['praticien_id'],
          $rdv['rdv_date']
        );
      }
    } else {
      echo "<tr><td colspan='6'>Aucun rendez-vous trouvé.</td></tr>";
    }
    ?>
  </tbody>
</table>

  </div>

  <!-- ----- fin viewinfo -->
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewinfo -->
