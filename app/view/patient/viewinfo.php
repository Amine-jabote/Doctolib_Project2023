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
        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Login</th>
                    <th scope="col">Password</th>
                    <th scope="col">Statut</th>
                    <th scope="col">Spécialité</th> 
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $personne) : ?>
                    <tr>
                        <td><?php echo $personne['id']; ?></td>
                        <td><?php echo $personne['nom']; ?></td>
                        <td><?php echo $personne['prenom']; ?></td>
                        <td><?php echo $personne['adresse']; ?></td>
                        <td><?php echo $personne['login']; ?></td>
                        <td><?php echo $personne['password']; ?></td>
                        <td><?php echo $personne['statut']; ?></td>
                        <td><?php echo $personne['specialite_id']; ?></td>
                          
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include($root . '/app/view/fragment/fragmentCaveFooter.html'); ?>
</body>
<!-- ----- fin viewprabyspe.php ----- -->
