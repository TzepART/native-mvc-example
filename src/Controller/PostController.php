<?php

namespace Controller;

use Kernel\BaseController;
use Model\Post;
use Service\AlertMessageService;

/**
 * Class PostController
 * @package Controller
 */
class PostController extends BaseController
{
    /**
     * @var mixed
     */
    private $postModel;

    /**
     * @var AlertMessageService
     */
    private $alertMessageService;


    /**
     * Posts constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
        $this->alertMessageService = new AlertMessageService($this->sessionHelper);
    }

    /**
     *
     */
    public function indexAction()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts,
            'alertMessageService' => $this->alertMessageService
        ];

        $this->view('post/index', $data);
    }


    /**
     * @param $id
     */
    public function showAction($id)
    {
        $post = $this->postModel->getPostById($id);
        $data = [
            'post' => $post,
        ];

        $this->view('post/show', $data);
    }

}