<?php
    namespace Person;

    // Inclusion du fichier Personne.php contenant la classe Personne
    require_once 'Personne.php';

    // Définition de la classe Formateur qui hérite de Personne
    class Formateur extends Personne {
        
        // Propriétés privées spécifiques à la classe Formateur
        private $salaireFixe;
        private $niveau;

        // Constructeur de la classe Formateur
        public function __construct($numero, $nom, $prenom, $heureSup, $salaireHoraire, $salaireFixe, $niveau) {
            // Appel du constructeur de la classe parente Personne
            parent::__construct($numero, $nom, $prenom, $heureSup, $salaireHoraire);

            // Initialisation des propriétés spécifiques de Formateur
            $this->salaireFixe = $salaireFixe;
            $this->niveau = $niveau;
        }

        // Méthode magique __get pour accéder aux propriétés privées
        public function __get($attr) {
            if(property_exists($this, $attr)) {
                return $this->$attr;
            } else {
                echo "L'attribut " . $attr . " n'existe pas";
            }
        }

        // Méthode magique __set pour modifier les propriétés privées
        public function __set($attr, $valeur) {
            if(property_exists($this, $attr)) {
                $this->$attr = $valeur;
            } else {
                echo "L'attribut " . $attr . " n'existe pas";
            }
        }

        // Méthode pour calculer le salaire du formateur
        public function CalculerSalaire() {
            return ($this->salaireHoraire * $this->heureSup) + $this->salaireFixe;
        }
    }
?>
