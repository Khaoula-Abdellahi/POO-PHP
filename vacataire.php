<?php
    namespace Person;

    // Inclusion du fichier Personne.php contenant la classe Personne
    require_once 'Personne.php';

    // Définition de la classe Vacataire qui hérite de Personne
    class Vacataire extends Personne {
        // Propriété privée spécifique à la classe Vacataire
        private $diplome;

        // Constructeur de la classe Vacataire
        public function __construct($numero, $nom, $prenom, $heureSup, $salaireHoraire, $diplome) {
            // Appel du constructeur de la classe parente Personne
            parent::__construct($numero, $nom, $prenom, $heureSup, $salaireHoraire);
            
            // Initialisation de la propriété spécifique de Vacataire
            $this->diplome = $diplome;
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

        // Méthode pour calculer le salaire du vacataire en fonction de son diplôme
        public function CalculerSalaire() {
            switch($this->diplome) {
                case '1er grade': 
                    $this->salaireHoraire =  120;
                    break;
                case '2eme grade': 
                    $this->salaireHoraire =  90;
                    break;
                case '3me grade': 
                    $this->salaireHoraire =  60;
                    break;
                default:
                    $this->salaireHoraire =  30;
                    break;
            }
            return ($this->salaireHoraire * $this->heureSup);
        }
    }
?>
