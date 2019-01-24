<?php

namespace Kernel;


/**
 * Class Core
 * @package Kernel
 */
final class Core
{

    /**
     * @var Core
     */
    private static $instance;

    /**
     * Core constructor.
     */
    private function __construct(){}

    /**
     * @return Core
     */
    public static function getInstance(): Core
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function initResponse() : void
    {
        try{
            $router = new Router();
            //Call a callback with array of params
            call_user_func_array([$router->getCurrentController(), $router->getCurrentMethod()], $router->getParams());
        }catch (\Exception $exception){
            require_once APP_ROOT."public/500.html";
        }
    }

    private function __clone(){}

    private function __wakeup(){}

}
