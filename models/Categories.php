<?php
class Categories{
      // Connexion
    private $connexion;
    private $table = "categories";
    
    // object properties
    public $id;
    public $nom;
    public $description;
    public $created_at;



     /**
     * Constructeur avec $db pour la connexion à la base de données
     *
     * @param $db
     */
    public function __construct($db){
        $this->connexion = $db;
    }

    /**
     * Lecture des categories
     *
     * @return void
     */
    public function lire(){
        // On écrit la requête
        $sql = "SELECT  nom,description,created_at  FROM  " . $this->table . "  ORDER BY created_at ASC";
       
        // On prépare la requête
        $query = $this->connexion->prepare($sql);

        // On exécute la requête
        $query->execute();

        // On retourne le résultat
        return $query;
    }

        /**
     * find one categorie
     *
     * @return void
     */
    public function lireUn(){
        // On écrit la requête
        $sql = "SELECT id,nom,description FROM " . $this->table . " WHERE id = ? LIMIT 0,1";

        // On prépare la requête
        $query = $this->connexion->prepare( $sql );

        // On attache l'id
        $query->bindParam(1, $this->id);

        // On exécute la requête
        $query->execute();

        // on récupère la ligne
        $row = $query->fetch(PDO::FETCH_ASSOC);

        // On hydrate l'objet
        $this->id=$row['id'];
        $this->nom = $row['nom'];
       $this->description = $row['description'];
       
    }
}
?>