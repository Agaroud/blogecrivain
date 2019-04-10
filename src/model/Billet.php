<?php

namespace App\src\model;

class Billet
{
    private $id;

    private $title;
    
    private $content; 
        
    private $date_added;

   
    public function getId()
    {
        return $this->id;
    }

    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    
    public function setTitle($title)
    {
        $this->title = $title;
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
        return $this->date_added;
    }

    
    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;
    }
}
