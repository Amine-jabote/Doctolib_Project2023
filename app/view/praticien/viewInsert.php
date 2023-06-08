
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='RDVcreated'>        
        <label class='w-25' for="id">rdv_Date (jj/mm/aaaa) : : </label><input type="date" name='rdv_date' size='20' value='01/01/2024'> <br/>                          
        <label class='w-25' for="id">rdv_nombre: </label><input type="int" name='rdv_nombre' size='1' value='0'> <br/> 
        <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



