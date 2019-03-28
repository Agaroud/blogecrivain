<?php

namespace App\templates;

class ViewSecure
{
    private $file;
    private $title;
    
    public function render($template, $data = [])
    {
        $this->file = '../admin/'.$template.'.php';
        $content  = $this->renderFile($this->file, $data);
        $viewSecure = $this->renderFile('../admin/baseSecure.php', [
            'title' => $this->title,
            'content' => $content
        ]);
        echo $viewSecure;
    }
    
    private function renderFile($file, $data)
    {
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            echo 'Fichier inexistant';
        }
    }
}