<!-- ----- début viewLogin -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');

?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCaveMenu.php';
        include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
        ?>
        <form action='router2.php' method='get'>
            <input type="hidden" name='action' value="loginIn">
            <input type='text' class="form-control" name='login' placeholder="Login"><br>
            <input type='password' class="form-control" name='password' placeholder="Password"><br><br>
            <input type='submit' class="btn btn-success" value='Submit'>
            <input type='reset' class="btn btn-danger" value='Effacer'>
        </form>
    </div>
</body>
    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

    <!-- ----- fin viewAccueil -->