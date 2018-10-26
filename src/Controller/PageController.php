<?php

namespace Controller;

use Kernel\BaseController;

/**
 * Class PageController
 * @package App\Controller
 */
class PageController extends BaseController
{

    /**
     *
     */
    public function indexAction()
   {
      $data = [
          'title' => 'Simple Blog Application',
          'description' => 'Simple Blog Application built using PHP7.'
      ];

      $this->view('page/index', $data);
   }

    /**
     *
     */
    public function aboutAction()
   {
      $data = [
          'title' => 'About Us',
          'description' => 'App to share posts with other users'
      ];

      $this->view('page/about',$data);
   }
}