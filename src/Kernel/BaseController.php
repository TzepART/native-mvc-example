<?php

namespace Kernel;


use Helper\SessionHelper;
use Helper\UrlHelper;


/**
 * Base Controller
 * Loads views
 * Class Controller
 */
abstract class BaseController
{

    /**
     * @var UrlHelper
     */
    protected $urlHelper;

    /**
     * @var SessionHelper
     */
    protected $sessionHelper;


    /**
     * @var Request
     */
    protected $request;

    /**
     * Posts constructor.
     */
    public function __construct()
    {
        $this->urlHelper = new UrlHelper();
        $this->sessionHelper = new SessionHelper();
        $this->request = new Request();
    }

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
