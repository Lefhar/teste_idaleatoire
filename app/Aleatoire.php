<?php

class Aleatoire
{
    private PDO $db; // déclaration de la variable de connexion


    /**
     * @brief  Construction l'objet de la connexion avec l'ordre de se connecté à la bdd par la class include\Database
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * @return string
     */
    public function idAleatoire():string
    {
        $alphabet = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
        $caractere = $alphabet[rand(0, 25)] . $alphabet[rand(0, 25)];

        $nombre = rand(100, 999);
        return $caractere . $nombre;
    }

    /**
     * @return string
     */
    public function getIdaleatoire():string
    {

        $id = $this->idAleatoire();
        $requete = $this->db->prepare('select identifiant from idaleatoire where identifiant=?');
         $requete->execute([$id]);
        if ($requete->rowCount()>0) {
            return 'erreur identifiant déjà en base';
        } else {
            $requete = $this->db->prepare('insert into idaleatoire ( identifiant) value (?)');
            $requete->execute([$id]);
            return $id . ' id entré en base';
        }
    }
}