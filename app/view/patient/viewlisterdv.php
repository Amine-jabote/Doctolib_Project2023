<!-- ----- début viewlisterdv.php ----- -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
        <?php
        include($root . '/app/view/fragment/fragmentCaveMenu.php');
        include($root . '/app/view/fragment/fragmentCaveJumbotron.html');
        ?>

        <h2>Liste de mes rendez-vous</h2>
        
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date du rendez-vous</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $patient) : ?>
                <tr>
                    <td><?php echo $patient['nom']; ?></td>
                    <td><?php echo $patient['prenom']; ?></td>
                    <td><?php echo $patient['rdv_date']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php include($root . '/app/view/fragment/fragmentCaveFooter.html'); ?>
</body>
<!-- ----- fin viewlisterdv.php ----- -->
