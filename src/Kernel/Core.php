<?php

namespace Kernel;


/**
 * Class Core
 * @package Kernel
 */
class Core
{

    /**
     * Core constructor.
     * TODO maybe add DB connection
     */
    public function __construct()
    {
        $router = new Router();

        //Call a callback with array of params
        call_user_func_array([$router->getCurrentController(), $router->getCurrentMethod()], $router->getParams());
    }


}
