<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.php';

        ?>
        <div class="mt-4 p-5 bg-success text-white rounded">
            <h1>Mes disponibilités</h1>
            <p>Retrouvez la liste de vos rendez-vous ci-dessous :</p>

        </div>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">date</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($results as $element) {
                    printf("<tr><td>%d</td><td>%s</td></tr>", $element['id'], $element['rdv_date']);
                }
                ?>
            </tbody>
        </table>

    </div>
    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>