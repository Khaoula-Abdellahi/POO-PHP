<?php
    namespace Person;

    // Définition de la classe abstraite Personne
    abstract class Personne {
        // Propriétés protégées de la classe Personne
        protected $numero;
        protected $nom;
        protected $prenom;
        protected $heureSup;
        protected $salaireHoraire;

        // Constructeur de la classe Personne
        public function __construct($numero, $nom, $prenom, $heureSup, $salaireHoraire){
            $this->numero = $numero;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->heureSup = $heureSup;
            $this->salaireHoraire = $salaireHoraire;
        }

        // Méthode magique __get pour accéder aux propriétés protégées
        public function __get($attr){
            if(property_exists($this, $attr)){
                return $this->$attr;
            }
            else {
                echo "L'attribut " . $attr . " n'existe pas";
            }
        }

        // Méthode magique __set pour modifier les propriétés protégées (sauf 'numero')
        public function __set($attr, $valeur){
            if($attr !== 'numero'){
                if(property_exists($this, $attr)){
                    $this->$attr = $valeur;
                }
                else{
                    echo "L'attribut " . $attr . " n'existe pas";
                }
            }
        }

        // Méthode abstraite à implémenter dans les sous-classes
        abstract public function CalculerSalaire();

        // Méthode magique __toString pour afficher une représentation textuelle de l'objet
        public function __toString(){
            return $this->numero . ' ' . strtoupper($this->nom); 
        }
    }
?>
