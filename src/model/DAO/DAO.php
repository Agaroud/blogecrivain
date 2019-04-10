<?php

namespace App\src\model\DAO;

use Exception;//classe de base
use PDO; //classe de base

abstract class DAO//classe abstraite : ne peut être instanciée
{
    
    private $connection;//propriété stockant état de la connection

    private function checkConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à getConnection()
        if($this->connection === null) {
            return $this->getConnection();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }

    //Méthode de connexion à notre base de données
    private function getConnection()
    {
        //Tentative de connexion à la base de données
        try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Renvoi de la connexion
            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());            
        }
    }
    
    
    protected function sql($sql, $parameters = null)//ne peut être appelé que depuis la classe ou ses heritiers
    {
        if($parameters)
        {
            $result = $this->checkConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        else{
            $result = $this->checkConnection()->query($sql);
            return $result;
        }
    }
}
