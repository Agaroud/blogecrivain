<?php

namespace App\config;

class Autoloader//évite d'avoir à faire les require dans templates
{
    public static function register()//Enregistre notre autoloader
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class) //Inclue le fichier correspondant à notre classe
    {
        $class = str_replace('App', '', $class);
        $class = str_replace('\\', '/', $class);
        require '../'.$class.'.php';
    }
}
