<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26/10/2018
 * Time: 12:51
 */

namespace Kernel;


use Helper\RequestHelper;


/**
 * Class Request
 * @package Kernel
 */
class Request
{

    /**
     * @var RequestHelper
     */
    private $get;

    /**
     * @var RequestHelper|null
     */
    private $post;


    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = new RequestHelper($_GET);

        if($this->isPostRequest() && $_POST){
            // Sanitize POST Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->post = new RequestHelper($_POST);
        }
    }

    /**
     * @return RequestHelper
     */
    public function getGet(): RequestHelper
    {
        return $this->get;
    }

    /**
     * @return RequestHelper|null
     */
    public function getPost():? RequestHelper
    {
        return $this->post;
    }


    /**
     * @return bool
     */
    public function isPostRequest()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    /**
     * @return bool
     */
    public function isGetRequest()
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

}