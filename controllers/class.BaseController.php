<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BaseController {
    
    var $pageName;
    var $interface;
    var $entity;

    function __construct($name) 
    {
        $this->pageName = $name;
        $this->loadEntity();
        $this->loadInterface();
    }

    function loadEntity()
    {
        $filename = 'entities/class.'.ucfirst($this->pageName).'Entity.php';
        if(file_exists($filename))
        {
            require $filename;
            $entityname = ucfirst($this->pageName).'Entity';
            
            $this->entity = new $entityname();
        }
    }
    
    function loadInterface()
    {
        $filename = 'interface/class.'.ucfirst($this->pageName).'Interface.php';
        if(file_exists($filename))
        {
            require $filename;
            $interfacename = ucfirst($this->pageName).'Interface';
            
            $this->interface = new $interfacename();
            $this->interface->render($this->pageName);
        }
    }
    
    
    
    
}

?>
