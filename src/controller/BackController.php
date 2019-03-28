<?php

namespace App\src\controller;

use App\src\model\DAO\BilletDAO;
use App\src\model\DAO\CommentDAO;
use App\src\model\View;
use App\src\model\ViewSecure;

class BackController
{
    private $billetDAO;
    private $commentDAO;    
	private $view;
	private $viewSecure;

	
    public function __construct()
    {
        $this->billetDAO = new BilletDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->viewSecure = new ViewSecure();
    }

    public function addBillet($post)
    {
        if(isset($post['submit'])) {
            $billetDAO = new BilletDAO();
            $billetDAO->addBillet($post);
            session_start();
            $_SESSION['add_billet'] = 'Le nouveau billet a bien été ajouté';
        }
        $this->view->render('add_billet', ['post' => $post]);
    }    
      
    public function editeBillet($idBillet)
    {
        $billet = $this->billetDAO->getBillet($idBillet);
        $this->view->render('edit_billet', ['billet' => $billet]);
    }
    
    public function modifierBillet($post,$idBillet)
    {
        if(isset($post['submit'])) {
            $billetDAO = new BilletDAO();
            $billetDAO->modifierBillet($post,$idBillet);
            session_start();
            $_SESSION['add_billet'] = 'Le billet a bien été modifié';
        }
        $idBillet=$_POST['idBillet'];
        $this->view->render('edit_billet', ['billet' => $billet]);
    }
    
    public function supprimeComment()
    {
        if(isset($_POST['idComment'])) {            
            $idComment=$_POST['idComment'];
            $commentDAO = new CommentDAO();
            $commentDAO->supprimeComment($idComment);
            session_start();
            $_SESSION['add_billet'] = 'Le commentaire a bien été supprimé';
        }  
        $comments = $this->commentDAO->getSignalComments();
        $this->view->render('signals', ['comments' => $comments]);
    }
    
    public function supprimeBillet()
    {
        if(isset($_POST['idBillet'])) {
            $idBillet=$_POST['idBillet'];
            $billetDAO = new BilletDAO();
            $billetDAO->supprimeBillet($idBillet);
            session_start();
            $_SESSION['add_billet'] = 'Le billet a bien été supprimé';
        }
        $comments= $this->commentDAO->getSignalNumber();
        $billets = $this->billetDAO->getBillets();
        $this->viewSecure->render('homeAdmin', ['billets' => $billets,'comments' => $comments]);
    }    
    
    public function SignalList()
    {
        $comments = $this->commentDAO->getSignalComments();
        $this->view->render('signals', ['comments' => $comments]);
    }
    
    public function SignalNumber()
    {
        $comments = $this->commentDAO->getSignalNumber();
        $this->view->render('homeAdmin', ['nombre' => $nombre]);
    }
    
}