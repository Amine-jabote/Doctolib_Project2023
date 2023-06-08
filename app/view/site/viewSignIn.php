<!-- ----- début viewSignIn -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.php';
     
        ?>
<div class="mt-4 mb-4 p-5 bg-success text-white rounded">
<h1>S'inscrire</h1>
  <p>Inscrivez-vous ci-dessous :</p>
  
</div>
        <form action='router2.php' method='get'>
            <input type="hidden" name='action' value="createaccount">
            <input type='text' class="form-control" required name='nom' placeholder="Nom"><br>
            <input type='text' class="form-control" required name='prenom' placeholder="Prénom"><br>
            <input type='text' class="form-control" required name='adresse' placeholder="Adresse"><br>
            <input type='text' class="form-control" required name='login' placeholder="Login"><br>
            <input type='password' class="form-control" required name='password' placeholder="Password"><br><br>
        
            <label for="statut">Votre statut :</label>
            <select class="form-control" name="statut" id="statut">
                <option value="0">administrateur</option>
                <option value="1">praticien</option>
                <option value="2">patient</option>
            </select>

            <label for="statut">Votre spécialité si vous êtes praticien :</label>
            <select class="form-control" name="specialite" id="specialite">
                <option value="0">je ne suis pas praticien</option>
                <option value="1">médecin généraliste</option>
                <option value="2">infirmier</option>
      <option value="3">dentiste</option>
                <option value="4">sage-femme</option>
                <option value="5">ostéopathe</option>
                <option value="6">kinésithérapeute</option>

            </select>
            <input type='submit' class="btn btn-success mt-4" value='Inscription'>
            <input type='reset' class="btn btn-danger mt-4" value='Effacer'>
        </form>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

    <!-- ----- fin viewSignIn -->