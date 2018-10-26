<?php

namespace Helper;

/**
 * Class SessionHelper
 * @package Helper
 */
class SessionHelper
{

    /**
     * SessionHelper constructor.
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * @param string $key
     * @return null
     */
    public function getValueByKey(string $key)
    {
        $value = $_SESSION[$key] ?? null;
        return $value;
    }

    /**
     * @param string $key
     * @param $value
     * @return SessionHelper
     */
    public function addValue(string $key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @return SessionHelper
     */
    public function removeValue(string $key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
        return $this;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function existsValue(string $key)
    {
        if (isset($_SESSION[$key]) && $_SESSION[$key]) {
            return true;
        } else {
            return false;
        }
    }

}