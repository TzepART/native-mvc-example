<?php

namespace Kernel;


/**
 * Base Controller
 * Loads views
 * Class Controller
 */
abstract class BaseController
{



    /**
     * Load view
     * @param $view
     * @param array $data
     */
    public function view($view, $data = [])
    {
      // Check for view file
      if(file_exists(APP_SRC_ROOT.'View/' . $view . '.php')) {
         require_once (APP_SRC_ROOT.'View/' . $view . '.php');
      } else{
         /// View does not exists
         die ('View does not exists');
      }
    }
}
