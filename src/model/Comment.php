<?php

namespace App\src\model;

class Comment
{
    private $id;
    
    private $pseudo;
    
    private $content;
    
    private $dateAdded;

    private $signalement;

    
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    
    public function getPseudo()
    {
        return $this->pseudo;
    }

    
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

   
    public function getContent()
    {
        return $this->content;
    }

   
    public function setContent($content)
    {
        $this->content = $content;
    }

    
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }

    public function getSignalement()
    {
        return $this->signalement;
    }

     public function setSignalement($signalement)
    {
        $this->signalement = $signalement;
    }
}