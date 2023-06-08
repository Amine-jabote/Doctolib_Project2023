<!-- ----- debut ControllerSite -->
<?php


class ControllerSite
{
    // Affiche un vin particulier (id)
    public static function loginIn()
    {
        $results = ModelPersonne::getOne($_GET['login'], $_GET['password']);
        // ----- Construction chemin de la vue
        include 'config.php';
        if ($results) {
            $_SESSION['login'] = $results;
            $_SESSION['statut'] = $results['statut'];
            $_SESSION['nom'] = $results['nom'];
            $_SESSION['prenom'] = $results['prenom'];
            
            $vue = $root . '/app/view/site/viewAccueil.php';
            if (DEBUG)
                echo ("ControllerSite : accueil : vue = $vue");
        } else {
            $vue = $root . '/app/view/site/viewLogin.php';
            if (DEBUG)
                echo ("ControllerSite : SiteLogin : vue = $vue");
        }
        require($vue);
    }
    
    
    // --- page d'acceuil
    public static function accueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/site/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerSite : accueil : vue = $vue");
        require($vue);
    }

        // --- page login
        public static function login()
        {
            include 'config.php';
            $vue = $root . '/app/view/site/viewLogin.php';
            if (DEBUG)
                echo ("ControllerSite : SiteLogin : vue = $vue");
            require($vue);
        }
        
        // --- logout
        public static function logout()
        {
            $_SESSION['login'] = 'vide';
            ControllerSite::accueil();
        }
        
        public static function SignIn()
        {
            include 'config.php';
            $vue = $root . '/app/view/site/viewSignIn.php';
            if (DEBUG)
                echo ("ControllerSite : SignIn : vue = $vue");
            require($vue);
            
        }
       
    
      public static function RDVdeleted() {
    // Récupérez l'ID du rendez-vous à supprimer
    $id_rdv = $_GET['id_rdv']; 

    // Supprimez le rendez-vous
    $success = self::Annulation_RDV($id_rdv);

    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/site/rdvdeleted.php';
    require($vue);
}

public static function createaccount() {
        include 'config.php';
        ModelPersonne::createaccount($_GET['nom'], $_GET['prenom'], $_GET['adresse'], $_GET['login'], $_GET['password'], $_GET['statut'], $_GET['specialite']);
        ControllerSite::logout();
    }
    
}


?>