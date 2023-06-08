<!-- ----- début viewAccueil -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
  </div>
    <br>
    
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
  <!-- ----- fin viewAccueil -->