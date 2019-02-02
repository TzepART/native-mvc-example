<?php

namespace App\Service;


use App\Helper\SessionHelper;


/**
 * Class SecurityService
 * @package Service
 */
class SecurityService
{
    /**
     * @var SessionHelper
     */
    private $sessionHelper;


    /**
     * SecurityService constructor.
     * @param SessionHelper $sessionHelper
     */
    public function __construct(SessionHelper $sessionHelper)
    {
        $this->sessionHelper = $sessionHelper;
    }

    /**
     * @return bool
     */
    public function isLoggedIn(){
        if ($this->sessionHelper->existsValue('user_login'))
        {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function loginUserSession(string $login, string $password)
    {
        $result = true;

        $hashPass = password_hash($password,PASSWORD_DEFAULT);
        $this->sessionHelper->addValue('user_login',$login);

        return $result;
    }

    public function logoutUser()
    {
        if($this->sessionHelper->existsValue('user_login')){
            $this->sessionHelper->removeValue('user_login');
        }
        return true;
    }
}