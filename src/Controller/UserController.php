<?php

namespace Controller;


use Kernel\BaseController;
use Model\Form\LoginForm;
use Service\AlertMessageService;
use Service\SecurityService;


/**
 * Class UserController
 * @package Controller
 */
class UserController extends BaseController
{
    /**
     * @var SecurityService
     */
    private $securityService;

    /**
     * @var AlertMessageService
     */
    private $alertMessageService;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->alertMessageService = new AlertMessageService($this->sessionHelper);
        $this->securityService = new SecurityService($this->sessionHelper);
    }

    /**
     *
     */
    public function loginAction()
    {
        $loginForm = (new LoginForm($this->request))->initFieldsByRequest();

        //Check for POST
        if ($this->request->isPostRequest()) {
            //Make sure are empty
            if ($loginForm->isValid()) {
                $auth = $this->securityService->loginUserSession(
                    $loginForm->getFieldByName('login')->getValue(),
                    $loginForm->getFieldByName('password')->getValue()
                );
                if($auth){
                    $this->urlHelper->redirectAction('post');
                }else{
                    // Load view with errors
                    $this->view('user/login', $loginForm);
                }
            } else {
                // Load view with errors
                $this->view('user/login', $loginForm);
            }
        } else {
            // Load view
            $this->view('user/login', $loginForm);
        }
    }

    /**
     *
     */
    public function logoutAction()
    {
        $this->securityService->logoutUser();
        $this->urlHelper->redirectAction('user/login');
    }

}