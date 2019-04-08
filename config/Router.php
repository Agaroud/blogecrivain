<?php

namespace App\config;

use App\src\controller\BackController;
use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use Exception;


class Router

{
    private $frontController;
    private $backController;
    private $errorController;


    public function __construct()

    {

        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->backController = new BackController();
    }

    
    public function run()
    {
        try
        {
            if(isset($_GET['route'])) 
            {
                if($_GET['route'] === 'billet'){
                    $this->frontController->billet($_GET['idBillet']);
                }
                
                else if($_GET['route'] === 'signalList'){
                    $this->backController->signalList();
                }
                
                else if($_GET['route'] === 'addBillet'){
                    $this->backController->addBillet();
                }
                
                else if($_GET['route'] === 'rajoutBillet'){
                    $this->backController->rajoutBillet($_POST);
                }                

                else if($_GET['route'] === 'addComment'){
                    $this->frontController->addComment($_POST,$_GET['idBillet']);
                }

                else if($_GET['route'] === 'signalComment'){
                    $this->frontController->signalComment();
                }
                
                else if($_GET['route'] === 'supprimeComment'){                   
                    $this->backController->supprimeComment();                    
                }
                
                else if($_GET['route'] === 'designalComment'){
                    $this->backController->designalComment();
                }
                
                else if($_GET['route'] === 'supprimeBillet'){
                    $this->backController->supprimeBillet();
                } 
                
                else if($_GET['route'] === 'editeBillet'){
                    $this->backController->editeBillet($_GET['idBillet']);
                }  
                
                else if($_GET['route'] === 'modifierBillet'){
                    $this->backController->modifierBillet($_POST,$_POST['idBillet']);
                }
                                
                else if($_GET['route'] === 'voirbillets') 
                {
                    $this->frontController->home();
                }
                
                else if($_GET['route'] === 'espaceAdmin')
                {
                    $this->frontController->espaceAdmin();
                }          
                       

                else{
                    $this->errorController->unknown();
                }
            }
            
            else
            {
                $this->frontController->premierepage();
            }
        }
        
        catch (Exception $e)
        {
            $this->errorController->error();
        }
    }
}
