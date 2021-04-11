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
     * Lecture des produits
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

}