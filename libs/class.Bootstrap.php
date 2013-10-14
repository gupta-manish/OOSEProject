<?php

class Bootstrap
{
    public function __construct()
    {
        Session::start();
        $url = $this->getUrl();
        $url = explode('/', $url);
        $this->bootErrorController();
        
        if(strcmp($url[0],'error') == 0)
        {
            $this->giveError();
            return;
        }
        
        $con_path = $this->getControllerPath($url);
       // echo "Controller Path -> ".$con_path."<br>"; 
        if(file_exists($con_path))
        {
            require $con_path;
            $con_name = $this->getControllerName($url);
        }
        else
        {
            //echo "rvrtivnt";
            $this->giveError();
            return;
        } 
       // echo "Controller Name -> ".$con_name;
        
        $con = new $con_name(); 
        if(isset($url[1]))
        {
            $con_func = $url[1];
            
            if(method_exists($con,$con_func))
            {
               // echo $con_name."->".$con_func."()";
                $con->$con_func();
            }
        }
        $con->interface->render($con->pageName);
        
    }
    
    private function getControllerPath($url)
    {
        $path = 'controllers/class.'.ucfirst($url[0]).'Controller.php';
        return $path;
    }
    
    private function getControllerName($url)
    {
        $class = ucfirst($url[0]).'Controller';
        return $class;
    }
    
    private function bootErrorController()
    {
        require 'controllers/class.ErrorController.php';
    }
    
    private function getUrl()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'],'/');
            if(Session::get(LOGGED_IN) == TRUE && ($url==='register'||$url==='login'))
            {
                $url = 'dashboard';
            }
            return $url;
        }
        else if(Session::get(LOGGED_IN) == TRUE)
        {
            $url = 'dashboard';
            require 'Interface/class.UserInterface.php';
            Session::set(USER,new UserInterface());
            //echo Session::get(USER)->getName()."Veevevevev";
            return $url;
        }
        else
        {
            $url = 'index';
            return $url;
        }
    }
    private function giveError()
    {
        $this->error = new ErrorController();
        $this->error->interface->render($this->error->pageName);
    }
}
?>
