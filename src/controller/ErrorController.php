<?php

namespace App\src\controller;

use App\src\model\DAO\BilletDAO;
use App\src\model\DAO\CommentDAO;
use App\templates\View;

class ErrorController
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
    
    public function unknown()
    {
        $this->view->render('unknown');
        //require '../templates/unknown.php';
    }

    public function error()
    {
        $this->view->render('error');
        //require '../templates/error.php';
    }
}