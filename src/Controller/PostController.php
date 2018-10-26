<?php

namespace Controller;

use Kernel\BaseController;
use Model\Post;

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
     * Posts constructor.
     */
    public function __construct()
    {
        $this->postModel = new Post();
    }

    /**
     *
     */
    public function indexAction()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts,
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