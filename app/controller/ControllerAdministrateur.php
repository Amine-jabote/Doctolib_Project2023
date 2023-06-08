<!-- ------ debut ControllerAdministrateur -->

<?php 

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezvous.php';


//require_once '../model/ModelRendezvous.php';

class ControllerAdministrateur {
    
    public static function administrateurInfo() {
        $results_specialite = ModelSpecialite::getAllspe();
        $results_administrateur = ModelPersonne::getAll(ModelPersonne::ADMINISTRATEUR);
        $results_praticien = ModelPersonne::getAll(ModelPersonne::PRATICIEN);
        $results_patient = ModelPersonne::getAll(ModelPersonne::PATIENT);
        $results_rendezvous = ModelRendezvous::getAllRdv();
        
        // --- construction chamin de la vue 
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewinfo.php';
        require ($vue);
    }
    
 public static function praticienReadAll() {
  $results = ModelSpecialite::getPraticiensWithSpecialites();

  // ----- Construction du chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewprabyspe.php';

  // Passage des données à la vue
  $data = array('results' => $results);

  // Chargement de la vue
  require($vue);
}



    public static function praticiensParPatient() {
  $results = ModelPersonne::getPraticiensParPatientCount();

  // ----- Construction du chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewpratparpatient.php';

  // Passage des données à la vue
  $data = array('results' => $results);

  // Chargement de la vue
  require($vue);
}

    
    
    public static function speReadAll() {
  $results = ModelSpecialite::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewspe.php';
  if (DEBUG)
   echo ("ControllerAdministrateur : speReadAll : vue = $vue");
  require ($vue);
 }
    
     public static function speReadId() {
  $results = ModelSpecialite::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewspeid.php';
  require ($vue);
 }
    
  public static function speReadOne() {
  $spe_id = $_GET['id'];
  $results = ModelSpecialite::getOne($spe_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewspe.php';
  require ($vue);
 }
 
  public static function speCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function speCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelSpecialite::insert(
      htmlspecialchars($_GET['label'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewInserted.php';
  require ($vue);
 }
}

