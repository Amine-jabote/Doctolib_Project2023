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
        
        <h2>Informations de mon compte</h2>
        <!-- Afficher le formulaire -->
        <form method="GET" action="router2.php">
            <input type="hidden" name='action' value='prendreRDVsuite'>
            <label for="praticien">Choisir un praticien :</label>
            <br>
            <select name="praticien" id="praticien">
                <?php foreach ($results as $personne) : ?>
                    <option value="<?php echo $personne['id']; ?>"><?php echo $personne['nom'] . ' ' . $personne['prenom']; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Valider</button>
        </form>
    </div>
    <?php include($root . '/app/view/fragment/fragmentCaveFooter.html'); ?>
</body>
<!-- ----- fin viewprabyspe.php ----- -->
