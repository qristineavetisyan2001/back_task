<?php

/*use Admin\;*/
//use Index\currentController;
/*use User\currentController;*/

class Route
{
    public $currentController = "IndexController";
    public $currentMetod = "index";

    public function __construct()
    {
        $url = $this->getUrl();

        if (isset($url[0])) {
            if(file_exists('app/controllers/' . ucwords($url[0]) . 'Controller.php')){
                $this->currentController = ucwords($url[0] . 'Controller');
            }else{
                $this->currentController = 'ErrorController';
            }
        }

        if (isset($url[1])) {
            $this->currentMetod = $url[1];
        }

        require_once 'app/controllers/' . $this->currentController . '.php';
        $obj = new $this->currentController;
        call_user_func([$obj, $this->currentMetod]);
    }
    public function getUrl()
    {
        $url = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
        unset($url[0]);
        $url = array_values($url);
        return $url;
    }
}


