<?php

namespace Helper;

/**
 * Class UrlHelper
 */
class UrlHelper
{
    /**
     * @param $page
     */
    public function redirectAction($page)
    {
        header('Location: ' . URL_ROOT . '/' . $page);
    }
}