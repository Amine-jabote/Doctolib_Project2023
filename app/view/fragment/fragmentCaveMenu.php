<!-- ----- début fragmentCaveMenu -->


<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">

      <?php
         if (isset($_SESSION['login']) && isset($_SESSION['statut']) && isset($_SESSION['nom']) && isset($_SESSION['prenom']))
        { 
        $statut = $_SESSION['statut'];
        $nom = $_SESSION['nom'];
        $prenom = $_SESSION['prenom'];
        $role = "inconnu";
            if ($statut == 0)
            {
                $role = "administrateur";
            }
            if ($statut == 1)
            {
                $role = "praticien";
            }
            if ($statut == 2)
            {
                $role = "patient";
            }
            }

      ?>
        <?php
                $administrateur = "<li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Administrateur</a>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='router2.php?action=speReadAll'>Liste des spécialités</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=speReadId'>Selection d une spécialité par son id</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=speCreate'>Insertion d une spécialité</a></li>
                    <hr>
                    <li><a class='dropdown-item' href='router2.php?action=praticienReadAll'>Liste de praticiens avec leur spécialité</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=praticiensParPatient'>Nombre de praticiens par patient</a></li>
                    <hr>
                    <li><a class='dropdown-item' href='router2.php?action=administrateurInfo'>Info</a></li>
                  </ul>
                </li>";
                $praticien = "<li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Practicien</a>
                <ul class='dropdown-menu'>
                  <li><a class='dropdown-item' href='router2.php?action=dispoReadAll'>Liste de mes disponibilités</a></li>
                  <li><a class='dropdown-item' href='router2.php?action=RDVcreate'>Ajout de nouvelles disponibilités</a></li>
                  <hr>
                  <li><a class='dropdown-item' href='router2.php?action=praticienReadAllRdv'>Liste des rendez-vous avec le nom des patients</a></li>
                  <li><a class='dropdown-item' href='router2.php?action=praticienPatients'>Liste de mes patients sans doublon</a></li>
                  <li><a class='dropdown-item' href='router2.php?action=annulerDispo'>Annulation d'une disponibilité</a></li>
                </ul>
              </li>";
                $patient = "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Patient</a>
              <ul class='dropdown-menu'>
                <li><a class='dropdown-item' href='router2.php?action=getInfo'>Mon Compte</a></li>
                <li><a class='dropdown-item' href='router2.php?action=patientReadAllRdv'>Listes de mes rendez-vous</a></li>
                <li><a class='dropdown-item' href='router2.php?action=getAllP'>Prendre un rendez-vous avec un practicien</a></li>
                <li><a class='dropdown-item' href='router2.php?action=annulerRDV'>Annulation d'un Rendez-vous</a></li>
              </ul>
            </li>";
        ?>

        

      
      
      
      <?php if ($_SESSION['login'] == "vide"): ?>
           <a class="navbar-brand" href="router2.php?action=FragmentMenu.php">Jabote-Sidqui | | |</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
        
      
      <?php else: ?>
        
        <a class="navbar-brand" href="router2.php?action=FragmentMenu.php"> Jabote-Sidqui </a>
        <h2>|</h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
            <?php
  
            if ($_SESSION['login'] != 'vide') {
                
                    echo '<li class="nav-item"  style="list-style-type: none;"><a class="nav-link" href="router2.php?action=FragmentMenu.php">' . $role . '</a></li>'; 
                    echo '<h2>|</h2>';
                    echo '<li class="nav-item" style="list-style-type: none;"><a class="nav-link" href="router2.php?action=FragmentMenu.php">' . $prenom . '</a></li>';
                    echo '<li class="nav-item"  style="list-style-type: none;"><a class="nav-link" href="router2.php?action=FragmentMenu.php">' . $nom . '</a></li>';
                    echo '<h2>|</h2>';
                    echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
                    echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
                    echo ' <li class="nav-item">';
                if ($role == "praticien") {

                echo $praticien;
                
                }
                
                if ($role == "patient") {
                echo $patient;
                }
                
                if ($role == "administrateur") {
                echo $administrateur;
                }
            }
    ?>
        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=RDVdeleted">Proposez une fonctionalité originale</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=login">Login</a></li>
            <li><a class="dropdown-item" href="router2.php?action=SignIn">s'inscrire</a></li>
            <li><a class="dropdown-item" href="router2.php?action=logout">Deconnexion</a></li> 
          </ul>
        </li>   
    </div>
    
</nav>




<!-- ----- fin fragmentCaveMenu -->