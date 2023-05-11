<!-- ----- début fragmentMenu -->
<html>
<?php
// Vérification que les variables $_POST sont définies avant de les utiliser
if (isset($_POST['login']) && isset($_POST['mot_de_passe'])) {
    // Requête SQL pour récupérer l'ID de l'utilisateur connecté à partir de la table personne
    $req = $connexion->prepare('SELECT id, statut, nom, prenom FROM personne WHERE login = :login AND mot_de_passe = :mot_de_passe');
    $req->execute(array('login' => $_POST['login'], 'mot_de_passe' => $_POST['mot_de_passe']));
    $resultat = $req->fetch();
    
    $role = "inconnu";
    if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

    $statut = 3; // initialisation de la variable à 0 pour éviter une variable non définie

    if ($resultat) { // Vérification si la requête a retourné un résultat
        $statut = (int) $resultat['statut']; // Cast du résultat en entier et stockage dans la variable $statut
    }
    
    $role = "inconnu";

    if ($statut == 0) {
        $role = "administrateur";
    } elseif ($statut == 1) {
        $role = "praticien";
    } elseif ($statut == 2) {
        $role = "patient";
    } else {
        // gérer le cas où le statut est inconnu ou invalide
        $role = "inconnu";
    }
    $_SESSION['role'] = $role;
    
    
    if ($resultat) { // Vérification si la requête a retourné un résultat
        $nom = $resultat['nom'];
    }

    // Vérification que la variable de session $_SESSION est initialisée avant de l'utiliser
    if (isset($_SESSION['id'])) {
        $req = $connexion->prepare('SELECT prenom FROM personne WHERE id = :id');
        $req->execute(array('id' => $_SESSION['id']));
        $resultat = $req->fetch();

        if ($resultat) {
            $prenom = $resultat['prenom'];
        }
    }
}
?>


<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router1.php?action=CaveAccueil"> Jabote-Sidqui</a>
    <p>|</p>
    <?php echo '<li class="nav-item"><a class="nav-link" href="#">' . $role . '</a></li>'; ?>
    <p>|</p>
        <?php
        echo '<li class="nav-item"><a class="nav-link" href="#">' . $prenom . '</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="#">' . $nom . '</a></li>';
        ?>
    <p>|</p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <?php 
        if ($role == "administrateur") {
            echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="router1.php?action=??">Liste de spécialités</a></li>
                    <li><a class="dropdown-item" href="router1.php?action=??">Selection d une spécialité par son id</a></li>
                    <li><a class="dropdown-item" href="router1.php?action=??">Insertion d une spécialité</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="router1.php?action=??">Liste de praticiens avec leur spécialité</a></li>
                    <li><a class="dropdown-item" href="router1.php?action=??">Nombre de praticiens par patient</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="router1.php?action=??">info</a></li>
                </ul>
            </li>';
            }

        if ($role == "praticien") {
            echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">Praticien</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="router1.php?action=??">Liste de mes disponibilités</a></li>
                    <li><a class="dropdown-item" href="router1.php?action=??">ajout de nouvelles disponibilités</a></li>
                    <hr>
                    <li><a class="dropdown-item" href="router1.php?action=??">Liste de rendez-vous avec le nom des patients</a></li>
                    <li><a class="dropdown-item" href="router1.php?action=??">Liste de mes patients (sans doublon)</a></li>
                </ul>
            </li>';
            }
        if ($role == "patient") {
            echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">Patient</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="router1.php?action=??">MonCompte</a></li>
                    <li><a class="dropdown-item" href="router1.php?action=??">liste de mes rendez-vous</a></li>
                    <li><a class="dropdown-item" href="router1.php?action=??">Prendre un rendez-vous avec un praticien</a></li>
                </ul>
            </li>';

        }
        ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=vinReadAll">Proposez une fonctionalité originale</a></li>
            <li><a class="dropdown-item" href="router1.php?action=vinReadId">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=ProducteurReadAll">Login</a></li>
            <li><a class="dropdown-item" href="router1.php?action=ProducteurReadId">s'inscrire</a></li>
            <li><a class="dropdown-item" href="router1.php?action=ProducteurCreate">Deconnexion</a></li> 
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

</html>

<!-- ----- fin fragmentMenu -->


