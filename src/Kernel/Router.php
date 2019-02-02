<?php

namespace App\Kernel;

use App\Controller\PageController;


/**
 * Class Router
 *
 * Create URL & load core controller
 * URL FORMAT - /controller/method/params
 * TODO make refactoring
 * @package Kernel
 */
class Router
{
    /**
     * @var array
     */
    private $url = [];

    /**
     * @var string
     */
    protected $currentController = PageController::class;

    /**
     * @var string
     */
    protected $currentMethod = 'indexAction';

    /**
     * @var array
     */
    protected $params = [];


    /**
     * Router constructor.
     */
    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = rtrim($_SERVER['REQUEST_URI'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            unset($url[0]);
            $this->url = $url;
        }
    }


    /**
     * @return string
     */
    public function getCurrentController()
    {
        // Look in controllers for first value
        if (isset($this->url[1]) && file_exists(APP_SRC_ROOT.'Controller/' . ucwords($this->url[1]) . 'Controller.php')) {
            // If exists, set as controller
            $this->currentController = 'App\\Controller\\'.ucwords($this->url[1]).'Controller';
            // Unset 0 url
            unset($this->url[1]);
        }

        // Instantiate controller class
        $this->currentController =  new $this->currentController;

        return $this->currentController;
    }

    /**
     * @return mixed|string
     */
    public function getCurrentMethod()
    {
        // Check for second part of url
        if (isset($this->url[2])) {
            $actionName = $this->url[2].'Action';
            if(method_exists($this->currentController, $actionName))
            {
                $this->currentMethod = $actionName;
                unset($this->url[2]);
            }
        }

        return $this->currentMethod;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        // Get params
        $this->params = $this->url ? array_values($this->url) : [];

        return $this->params;
    }
}
