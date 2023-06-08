<!-- ----- debut Router1 -->
<?php
require('../controller/ControllerSite.php');
require('../controller/ControllerRecolte.php');
require('../controller/ControllerAdministrateur.php');
require('../controller/ControllerPraticien.php');
require('../controller/ControllerPatient.php');


session_start();

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

$action = $param['action'];
unset($param['action']);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
  
  
  case "login":
  case "logout":
  case "SignIn":
  case"SaveController":
  case "RDVdeleted":
  case "loginIn":
  case "createaccount":
    ControllerSite::$action();
    break;

  case "administrateurInfo":
  case "speReadAll":
  case "speReadOne":
  case "speReadId":
  case "speCreate":
  case "speCreated":
  case "praticienReadAll":
  case "praticiensParPatient": 
      ControllerAdministrateur::$action($args);
    break;

   case "dispoReadAll":  
   case "RDVcreate":
   case  "RDVcreated":
   case "praticienReadAllRdv":
   case "praticienPatients":
   case "annulerDispo":
   case "annulerDisposuite":
       ControllerPraticien::$action($args);
       break;
   
  case "getInfo":
  case "patientReadAllRdv":
  case "getAllP":
  case "prendreRDVsuite":
  case "sauvegardeRDV":
  case "annulerRDV":
  case "annulerRDVsuite":
      ControllerPatient::$action($args);
      break;
  

    // Tache par défaut
  default:
    $action = "accueil";
    ControllerSite::$action();
}
?>
<!-- ----- Fin Router1 -->