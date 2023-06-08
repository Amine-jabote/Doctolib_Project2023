<!-- ------ debut ControllerPraticien -->

<?php 

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezvous.php';
require_once '../model/Model.php';

class ControllerPraticien {

public static function dispoReadAll()
    {
        include 'config.php';
        $results = ModelPersonne::getDispoFromPraticien($_SESSION['login']['id']);
        $vue = $root . '/app/view/praticien/viewdispo.php';
            echo ("ControllerPraticien : dispoReadAll : vue = $vue");
        require($vue);
    }
    
     public static function praticienReadAllRdv() {
  $results = ModelRendezvous::getRdvWithName($_SESSION['login']['id'], 0);

  // ----- Construction du chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/praticien/viewRdvWN.php';

  // Passage des données à la vue
  $data = array('results' => $results);

  // Chargement de la vue
  require($vue);
}

public static function praticienPatients() {
  $results = ModelRendezvous::getRdvWithNsd($_SESSION['login']['id'], 0);

  // ----- Construction du chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/praticien/viewPatients.php';

  // Passage des données à la vue
  $data = array('results' => $results);

  // Chargement de la vue
  require($vue);
}


    
    public static function RDVcreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewInsert.php';
        require($vue);
    }
    
     public static function RDVcreated()
    {
        // ajouter une validation des informations du formulaire
         $finalDate = $_GET['rdv_date'] . " à 1" . $_GET['rdv_nombre'] ."h00";
        $results = ModelRendezvous::Insert(
            $_GET['rdv_date'], 
            $_GET['rdv_nombre'],
            $_SESSION['login']['id']
          );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewinserted.php';
        require($vue);
    }
    
    public static function annulerDispo() {
        include 'config.php';

        $crenaux = ModelPersonne::getDispoFromPraticien($_SESSION['login']['id']);

        $vue = $root . '/app/view/praticien/viewannulerDispo.php';
        if (DEBUG)
            echo ("ControllerPatient : annulerRDV : vue = $vue");
        require($vue);
    }
    public static function annulerDisposuite() {
        include 'config.php';

        $id_rdv = $_GET['id_rdv'];
        
  
        // Call the cancelRDV method
        $success = ModelRendezvous::cancelDisponibilite($id_rdv);
  
        $vue = $root . '/app/view/praticien/dispodeleted.php';
        if (DEBUG)
            echo ("ControllerPatient : annulerRDVsuite : vue = $vue");
        require($vue);
      }
}
    
   