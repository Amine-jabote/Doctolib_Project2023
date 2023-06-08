
<?php

require_once 'Model.php';


class ModelPersonne extends Model
{
     const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;


    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id, $label,$patient_id,$particien_id,$rdv_date, $id_rdv;

    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL ,$password = NULL, $statut = NULL, $specialite_id = NULL, $label = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL, $id_rdv = NULL)
{
    if (!is_null($id)&& !is_null($nom) && !is_null($prenom) && !is_null($role)) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->login = $login;
        $this->password = $password;
        $this->statut = $statut;
        $this->specialite_id = $specialite_id;
        $this->label = $label;
        $this->patient_id = $patient_id;
        $this->praticien_id = $praticien_id;
        $this->rdv_date = $rdv_date;   
        $this->id_rdv = $id_rdv; 
        
    }
}


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    
    public function setLogin($login)
    {
        $this->login = $login;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
    
    public function setSpecialite_id($specialite_id)
    {
        $this->specialite_id = $specialite_id;
    }
    
     public function setLabel($label)
    {
        $this->label = $label;
    }
    public function setPatient_id($patient_id)
    {
        $this->patient_id = $patient_id;
    }
     public function setPraticien_id($praticien_id)
    {
        $this->praticien_id = $praticien_id;
    }
     public function setRdv_date($rdv_date)
    {
        $this->rdv_date = $rdv_date;
    }
    public function setRdv_ID($id_rdv)
    {
        $this->id_rdv = $id_rdv;
    }



    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
    
    public function getLogin()
    {
        return $this->login;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function getStatut()
    {
        return $this->statut;
    }
    
    public function getSpecialite_id()
    {
        return $this->specialite_id;
    }
    
     public function getLabel()
    {
        return $this->label;
    }
    public function getPatient_id()
    {
        return $this->patient_id;
    }
    public function getPraticien_id()
    {
        return $this->praticien_id;
    }
    public function getRdv_date()
    {
        return $this->rdv_date;
    }
    
      public function getRdv_ID()
    {
        return $this->id_rdv;
    }




    public static function createaccount($nom, $prenom, $adresse, $login, $password, $statut, $specialite_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select max(id) from personne";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            $specialite_id = intval($specialite_id);
            $statut = intval($statut);
            $query = "INSERT INTO personne (id, nom, prenom, adresse, login, password, statut, specialite_id) VALUES (:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'login' => $login,
                'password' => $password,
                'statut' => $statut,
                'specialite_id' => $specialite_id,
            ]);

            $_SESSION['login'] = $login;
            $_SESSION['statut'] = ModelPersonne::getJob($login);
            $_SESSION['nomcomplet'] = $nom . " " . $prenom;
            return true;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }
    
    public static function getJob($login)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE login= :login";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
            ]);

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $job = $results[0]['statut'];

            /*$query = "SELECT FROM specialite WHERE id= :job";
            $statement = $database->prepare($query);
            $statement->execute([
                'job' => $job,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $results[0]['label'];*/
            if ($job == 0) {
                return "administrateur";
            } else if ($job == 1) {
                return "praticien";
            } else if ($job == 2) {
                return "patient";
            } else {
                return "err001";
            }
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    

    //retourne une liste des personne
       public static function getAll($statut) {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM personne WHERE statut = :statut";
        $statement = $database->prepare($query);
        $statement->bindParam(":statut", $statut);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
        } 
        catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
                                 }
        }
        
        
        public static function countPersonne($statut)
{
    try {
        $database = Model::getInstance   ();
        $query = "SELECT COUNT(*) AS count FROM personne WHERE statut = :statut";
        $statement = $database->prepare($query);
        $statement->bindParam(":statut", $statut);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}


        
        public static function getPraticiensParPatientCount() {
  try {
    $database = Model::getInstance();
    $query = "SELECT patient_id, COUNT(DISTINCT praticien_id) AS nb_praticiens
              FROM rendezvous
              WHERE patient_id != 0
              GROUP BY patient_id";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}

public static function getDispoFromPraticien($praticien_id){
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous where praticien_id = :praticien_id and patient_id = 0";
            $statement = $database->prepare($query);
            $statement->execute([
                'praticien_id' => $praticien_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    

    public static function getInfoFromPatient($nom,$prenom){
        try {
            $database = Model::getInstance();
            $query = "select * from personne where nom = :nom and prenom = :prenom and statut = 2";
            $statement = $database->prepare($query);
            $statement->execute([
                'nom' => $nom,
                'prenom'=>$prenom
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

       public static function getAllPrac() {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM personne WHERE statut = 1";
        $statement = $database->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
        } 
        catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
                                 }
        }
        
    public static function sauvegardeRDV($id_rdv, $id_patient) {
        try {
            $database = Model::getInstance();


            $query = "UPDATE rendezvous SET patient_id = :id_patient WHERE id = :id_rdv";
            $statement = $database->prepare($query);
            $statement->execute([
                'id_patient' => $id_patient,
                'id_rdv' => $id_rdv,
            ]);


            return true;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
        // retourne une personne pour un login et mot de passe donné
    public static function getOne($login, $password)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE login= :login AND password= :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
                'password' => $password
            ]);
            $results = $statement->fetch(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    
    
}
?>
<!-- ----- fin ModelVin -->