<?php

namespace App\Database;

use PDO;

/**
 * used for comunication with the database
 */
class mysqlQuery
{
    private $host;
    private $dbname;
    private $username;
    private $password;

    /**
     * Stores database
     */
    public function __construct()
    {
        $configs = include(__DIR__.'/../Config/mysqlConfig.php');
        $this->host = $configs['host'];
        $this->dbname = $configs['dbname'];
        $this->username = $configs['username'];
        $this->password = $configs['password'];
    }

    /**
     * Take a sql request and return the result
     *
     * @param string $query
     * @return mixed
     */
    public function sqlQuery($query)
    {
        try {
            $bdd = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, $this->password);
        } catch (Exeption $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $query = $bdd->query($query);
        if (!$query) {
            die("Erreur 500");
        }
        $result = $query->fetchAll();
        return $result;
    }
}
