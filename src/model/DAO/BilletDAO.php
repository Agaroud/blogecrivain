<?php

namespace App\src\model\DAO;

use App\src\model\Billet;

class BilletDAO extends DAO
{
    public function getBillets()
    {
        $sql = 'SELECT id, title, content, date_added FROM billet ORDER BY id DESC';
        $result = $this->sql($sql);
        $billets = [];
        foreach ($result as $row) {
            $billetId = $row['id'];
            $billets[$billetId] = $this->buildObject($row);
        }
        return $billets;
    }

    public function getBillet($idBillet)
    {
        $sql = 'SELECT id, title, content, date_added FROM billet WHERE id = ?';
        $result = $this->sql($sql, [$idBillet]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        } else {
            echo 'Aucun billet existant avec cet identifiant';
        }
    }

    public function addBillet($billet)
    {
        //Permet de récupérer les variables $title et $content
        extract($billet);
        $sql = 'INSERT INTO billet (title, content, date_added) VALUES (?, ?, NOW())';
        $this->sql($sql, [$title, $content]);
    }
    
    public function supprimeBillet($idBillet)
    {
        $sql = 'DELETE FROM billet WHERE id = ?' ;
        $this->sql($sql,[$idBillet]);
    }
    
    public function modifierBillet($billet,$idBillet)
    {
        extract($billet);
        $sql = 'UPDATE billet SET title = ?, content = ?, date_added = NOW() WHERE id = ?';
        $this->sql($sql, [$title, $content]);
    }
    
    public function editeBillet($idBillet)
    {
        $sql = 'SELECT id, title, content, date_added FROM billet WHERE id = ?';
        $result = $this->sql($sql, [$idBillet]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        } else {
            echo 'Aucun billet existant avec cet identifiant';
        }
    }
    
    private function buildObject(array $row)
    {
        $billet = new Billet();
        $billet->setId($row['id']);
        $billet->setTitle($row['title']);
        $billet->setContent($row['content']);
        $billet->setDateAdded($row['date_added']);
        
        return $billet;
    }
}
