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
            require_once $con_path;
            $con_name = $this->getControllerName($url);
        }
        else
        {
            //echo "rvrtivnt";
            $this->giveError();
            return;
        } 
       // echo "Controller Name -> ".$con_name.'<br>';
        
        $con = new $con_name(); 
        if(isset($url[1]))
        {
            $con_func = $url[1];
            
            if(method_exists($con,$con_func))
            {
               if(isset($url[2]))                   
               {
                   $con->$con_func($url[2]);
               }
               else
               {
                   $con->$con_func();
               }
            }
        }
        //echo $con->pageName;
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
        require_once 'controllers/class.ErrorController.php';
    }
    
    private function getUrl()
    {
        if(isset($_GET['url']))
        {
            $url = rtrim($_GET['url'],'/');
            if(Session::get(LOGGED_IN) == TRUE && ($url==='register'||$url==='login'))
            {
                 $url = 'dashboard/get'.ucfirst(getUserType()).'Dashboard';
            }
            return $url;
        }
        else if(Session::get(LOGGED_IN) == TRUE)
        {           
            $url = 'dashboard/get'.ucfirst(getUserType()).'Dashboard';
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
