<?php

namespace App\src\controller;//utilisation des namespace pour afin de ne pas à avoir à se soucier
//si un nom a déjà été utilisé par une autre constante, fonction ou classe

use App\src\model\DAO\BilletDAO;
use App\src\model\DAO\CommentDAO;
use App\templates\View;


class BackController
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

    public function addBillet()
    {
        $this->view->render('add_billet');
    }  
        
    public function rajoutBillet($post)
    {        
        if(isset($post['submit']) and !empty($post['title']) and !empty($post['content'])){
            $billetDAO = new BilletDAO();
            $billetDAO->rajoutBillet($post);            
            session_start();
            $_SESSION['add_billet'] = 'Le nouveau billet a bien été ajouté';
            $billets = $this->billetDAO->getBillets();
            $nb= $this->commentDAO->getSignalNumber();
            $this->view->render('homeAdmin', ['billets' => $billets,'nb' => $nb]); 
        }
        else{
            echo "<script language='javascript'>confirm('le titre et texte doivent être remplis')</script>";
            $this->view->render('add_billet');
            }
    }
    
      
    public function editeBillet($idBillet)
    {
        $billet = $this->billetDAO->getBillet($idBillet);
        $this->view->render('edit_billet', ['billet' => $billet]);
    }
    
    public function modifierBillet($post)
    {
        if(isset($post['submit'])) {
            $idBillet=$_POST['idBillet'];
            $billetDAO = new BilletDAO();
            $billetDAO->modifierBillet($post,$idBillet);
            session_start();
            $_SESSION['modif_billet'] = 'Le billet a bien été modifié';            
            $billets = $this->billetDAO->getBillets();
            $nb= $this->commentDAO->getSignalNumber();           
            $this->view->render('homeAdmin', ['billets' => $billets,'nb' => $nb]);            
        }
        
    }
    
    public function designalComment(){
        
        if(isset($_GET['idComment'])) {
            $idComment=$_GET['idComment'];
            $commentDAO = new CommentDAO();
            $commentDAO->designalComment($idComment);
            session_start();
            $_SESSION['designal_comment'] = 'Le commentaire a bien été désignalé';
        }
        $comments = $this->commentDAO->getSignalComments();
        $this->view->render('signals', ['comments' => $comments]);
    }    
    
    public function supprimeComment()
    {
        if(isset($_POST['idComment'])) {            
            $idComment=$_POST['idComment'];
            $commentDAO = new CommentDAO();
            $commentDAO->supprimeComment($idComment);
            session_start();
            $_SESSION['suppr_comment'] = 'Le commentaire a bien été supprimé';
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
            $_SESSION['suppr_billet'] = 'Le billet a bien été supprimé';
        }        
        $billets = $this->billetDAO->getBillets();
        $nb= $this->commentDAO->getSignalNumber();
        $this->view->render('homeAdmin', ['billets' => $billets,'nb' => $nb]);
    }    
    
    public function signalList()
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