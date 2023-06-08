
<?php

require_once 'Model.php';


class ModelRendezvous extends Model
{
     const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;


    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id, $label,$patient_id,$praticien_id,$rdv_date;

    public function   construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL ,$password = NULL, $statut = NULL, $specialite_id = NULL, $label = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL)
    {
        if (!is_null($id)&& !is_null($nom) && !is_null($prenom)) {
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
            $this->rdv_date= $rdv_date;
            
            
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
    
    
     public static function getAllRdv() {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM rendezvous";
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
        
        public static function Insert($rdv_date, $rdv_nombre, $session_id){
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from rendezvous";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            for ($i = 0; $i < $rdv_nombre; $i++) {
                $query = "INSERT INTO rendezvous VALUES (:id, 0, :praticien_id, :rdv_date)";
                $statement = $database->prepare($query);
                $finalDate = $rdv_date . " à 1" . $i ."h00";
                $statement->execute([
                    'id' => $id,
                    'praticien_id' => $session_id,
                    'rdv_date' => $finalDate,
                ]);
                $id++;
            }
            return $rdv_nombre;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
        
        
        
public static function getListeRdv($patient_id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT rdv.praticien_id, rdv.id, p.nom, p.prenom, rdv.rdv_date
              FROM rendezvous rdv
              JOIN personne p ON rdv.praticien_id = p.id
              WHERE rdv.patient_id = :patient_id";
    $statement = $database->prepare($query);
    $statement->bindValue(":patient_id", $patient_id);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}



public static function getRdvWithName($praticien_id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT rdv.id, p.nom, p.prenom,p.adresse, rdv.rdv_date
              FROM rendezvous rdv
              JOIN personne p ON rdv.patient_id = p.id
              WHERE rdv.praticien_id = :praticien_id and patient_id != 0" ;
    $statement = $database->prepare($query);
    $statement->bindValue(":praticien_id", $praticien_id);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}


public static function getRdvWithNsd($praticien_id,$patient_id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT rdv.id, p.nom, p.prenom,p.adresse, rdv.rdv_date
              FROM rendezvous rdv
              JOIN personne p ON rdv.patient_id = p.id
              WHERE rdv.praticien_id = :praticien_id and patient_id != 0
              GROUP BY p.id" ;
    $statement = $database->prepare($query);
    $statement->bindValue(":praticien_id", $praticien_id);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}

       
public static function getRdvFromPatient($patient_id){
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous where patient_id = :patient_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'patient_id' => $patient_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
   public static function cancelRDV($id_rdv) {
    try {
        $database = Model::getInstance();
        $query = "UPDATE rendezvous SET patient_id = 0 WHERE id = :id_rdv";
        $statement = $database->prepare($query);
        $statement->bindValue(":id_rdv", $id_rdv);
        $statement->execute();
        return true;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return false;
    }
}
    
   public static function cancelDisponibilite($id_rdv) {
    try {
        $database = Model::getInstance();
        $query = "DELETE FROM rendezvous WHERE patient_id = 0 AND id = :id_rdv";
        $statement = $database->prepare($query);
        $statement->bindValue(":id_rdv", $id_rdv);
        $statement->execute();
        return true;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return false;
    }
}

}

