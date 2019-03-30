<?php

namespace App\src\controller;

use App\src\model\DAO\BilletDAO;
use App\src\model\DAO\CommentDAO;
use App\templates\View;


class FrontController
{
	private $billetDAO;
    private $commentDAO;
    private $view;    
    

    public function __construct()

    {
        $this->billetDAO = new BilletDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();        
    }

    public function addComment($post,$idBillet)
    {
        if(isset($post['submit'])) {
            $commentDAO = new CommentDAO();
            $commentDAO->addComment($post,$idBillet);
            session_start();
            $_SESSION['add_billet'] = 'Le nouveau commentaire a bien été ajouté';          
            $billet = $this->billetDAO->getBillet($idBillet);
        	$comments = $this->commentDAO->getCommentsFromBillet($idBillet);
        	$this->view->render('single', ['billet' => $billet,'comments' => $comments]);        	
        }        
    }
    
    public function signalComment(){
    
        if(isset($_POST['idComment'])) {            
            $idComment=$_POST['idComment'];
            $commentDAO = new CommentDAO();
            $commentDAO->signalComment($idComment);
            session_start();
            $_SESSION['add_billet'] = 'Le commentaire a bien été signalé';          
        }        
        $idBillet=$_POST['idBillet'];
        $this->billet($idBillet);
    }    
    
    public function premierepage()
    {        
        $this->view->render('premierepage');
    }
    
    public function espaceAdmin()
    {
        $comments= $this->commentDAO->getSignalNumber();
        $billets = $this->billetDAO->getBillets();
        $this->view->render('homeAdmin', ['billets' => $billets,'comments' => $comments]);
    }
    
    public function home()
    {    	
        $billets = $this->billetDAO->getBillets();
        $this->view->render('home', ['billets' => $billets]);
    }

    public function billet($idBillet)
    {        
        $billet = $this->billetDAO->getBillet($idBillet);
        $comments = $this->commentDAO->getCommentsFromBillet($idBillet);
        $this->view->render('single', ['billet' => $billet,'comments' => $comments]);
    }
}