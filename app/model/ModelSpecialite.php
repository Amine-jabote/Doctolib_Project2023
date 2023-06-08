
<?php

require_once 'Model.php';


class ModelSpecialite extends Model
{
     const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;


    private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id, $label;

    public function   construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL ,$password = NULL, $statut = NULL, $specialite_id = NULL, $label = NULL)
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
    
    
     public static function getAllspe() {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM specialite";
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
    

public static function getAll() {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM specialite ";
        $statement = $database->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
        return $results;
        } 
        catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
                                 }
        }
        
         public static function getPraticiensWithSpecialites() {
  try {
    $database = Model::getInstance();
    $query = "SELECT p.id, p.nom, p.prenom, p.adresse, p.statut, s.label AS specialite
              FROM personne p
              JOIN specialite s ON p.specialite_id = s.id
              WHERE p.statut = :statut";
    $statement = $database->prepare($query);
    $statement->bindValue(":statut", ModelPersonne::PRATICIEN);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $results;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}
        
 public static function getAllId()
    {
        try {
            $database = Model::getInstance();
            $query = "select id from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
     
    
    
     public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from specialite where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 
 public static function insert($label) {
  try {
    $database = Model::getInstance();

    // Vérifier si la spécialité existe déjà
    $query = "SELECT id FROM specialite WHERE label = :label";
    $statement = $database->prepare($query);
    $statement->execute(['label' => $label]);
    $existingSpeciality = $statement->fetch();

    if ($existingSpeciality) {
      // La spécialité existe déjà, retourner son ID
      return $existingSpeciality['id'];
    }

    // La spécialité n'existe pas, procéder à l'insertion
    // Recherche de la valeur de la clé = max(id) + 1
    $query = "SELECT MAX(id) FROM specialite";
    $statement = $database->query($query);
    $tuple = $statement->fetch();
    $id = $tuple[0] + 1;

    // Ajout d'un nouveau tuple
    $query = "INSERT INTO specialite VALUE (:id, :label)";
    $statement = $database->prepare($query);
    $statement->execute([
      'id' => $id,
      'label' => $label,
    ]);

    return $id;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return -1;
  }
}

 
 
}

