<?php

namespace App\Repository;

use App\Database\mysqlQuery;
use PDO;

/**
 * Gère les gagnants dans la base de donnée
 */
class WinnerRepository
{

    /**
     * Stocke les gagnants
     *
     * @var array
     */
    private $winners = [];
    
    /**
     * Prends les gagnants de la base de donnée et les stocke dans $winners
     *
     * @return void
     */
    public function storeWinners()
    {
        $this->posts = [];
        $mysqlQuery = new mysqlQuery();
        $postArray = $mysqlQuery->sqlQuery('SELECT * FROM winners');
        for ($i=0; $i < sizeof($postArray); $i++) {
            $this->winners[$i] = [
                "id" => $postArray[$i]["id"],
                "nom" => $postArray[$i]["nom"],
                "prenom" => $postArray[$i]["prenom"],
                "email" => $postArray[$i]["email"]
            ];
        }
    }

    /**
     * Retourne le nombre de gagnants
     *
     * @return int le nombre de gagnants
     */
    public function getWinnerNumber()
    {
        if ($this->winners == []) {
            $this->storeWinners();
        }
        return sizeof($this->winners);
    }

    /**
     * Vérifie si un gagnant possède déjà un email identique
     *
     * @param array $winner
     * @return bool 
     */
    public function checkWinnerEmail($winner)
    {
        if ($this->winners == []) {
            $this->storeWinners();
        }
        $validated = true;
        for ($i=0; $i < sizeof($this->winners); $i++) { 
            if ($winner["email"] == $this->winners["email"]){
                $validated = false;
            }
        }
        return $validated;
    }

    /**
     * Stocke un gagnant dans la base de donnée
     *
     * @param array $winner
     * @return void
     */
    public function submitWinner($winner)
    {
        $nom = str_replace("'", "\'", $winner['nom']);
        $prenom = str_replace("'", "\'", $winner['prenom']);
        $email = str_replace("'", "\'", $winner['email']);
        $mysqlQuery = new mysqlQuery();
        $mysqlQuery->sqlQuery('INSERT INTO winners(nom, prenom, email) VALUES(
            \'' . htmlspecialchars($nom) . '\',
            \'' . htmlspecialchars($prenom) . '\',
            \'' . htmlspecialchars($email) . '\'
        )');
    }

}
