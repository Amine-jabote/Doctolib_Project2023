<?php

require_once '../model/ModelPersonne.php';
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelRendezvous.php';
require_once '../model/Model.php';

class ControllerPatient {
    public static function getInfo()
    {
        include 'config.php';
        $results = ModelPersonne::getInfoFromPatient($_SESSION['nom'], $_SESSION['prenom']);
        $vue = $root . '/app/view/patient/viewinfo.php';
        echo ("ControllerPatient : getInfo : vue = $vue");
        require($vue);
     }
        
public static function patientReadAllRdv() {
  // Récupérer l'ID du patient connecté depuis la session
  //$patient_id = $_SESSION['login']['id'];
  // Récupérer les rendez-vous du patient avec les informations des praticiens
  $results = ModelRendezvous::getListeRdv($_SESSION['login']['id']);
  // Chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewlisterdv.php';
  // Passage des données à la vue
  $data = array('results' => $results);
  // Chargement de la vue
  require($vue);
}


 
        public static function getAllP()
    {
        include 'config.php';
        $results = ModelPersonne::getAllPrac();
        $vue = $root . '/app/view/patient/viewrdvprac.php';
        echo ("ControllerPatient : getInfo : vue = $vue");
        require($vue);
        }
        
        
        public static function prendreRDVsuite() {
        include 'config.php';

        $crenaux = ModelPersonne::getDispoFromPraticien($_GET['praticien']);

        $vue = $root . '/app/view/patient/viewprendreRDVsuite.php';
        if (DEBUG)
            echo ("ControllerSite : prendreRDV2 : vue = $vue");
        require($vue);
    }
    
    public static function sauvegardeRDV() {
        include 'config.php';
        $id_rdv = $_GET['id_rdv'];
        $id_patient = $_SESSION['login']['id'];
        
        
        $database = Model::getInstance();

        ModelPersonne::sauvegardeRDV($id_rdv, $id_patient);
        $vue = $root . '/app/view/patient/viewajoutreussi.php';
        if (DEBUG)
            echo ("ControllerPatient : sauvegardeRDV : vue = $vue");
        require($vue);
    }

    
          public static function annulerRDV() {
        include 'config.php';

        $crenaux = ModelRendezvous::getRdvFromPatient($_SESSION['login']['id']);

        $vue = $root . '/app/view/patient/viewannulerRDV.php';
        if (DEBUG)
            echo ("ControllerPatient : annulerRDV : vue = $vue");
        require($vue);
    }
    
      public static function annulerRDVsuite() {
        include 'config.php';

        $id_rdv = $_GET['id_rdv'];
        
  
        // Call the cancelRDV method
        $success = ModelRendezvous::cancelRDV($id_rdv);
  
        $vue = $root . '/app/view/patient/rdvdeleted.php';
        if (DEBUG)
            echo ("ControllerPatient : annulerRDVsuite : vue = $vue");
        require($vue);
      }
      
    }

    