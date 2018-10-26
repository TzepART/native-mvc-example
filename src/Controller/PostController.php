<?php

namespace Controller;

use Kernel\BaseController;
use Model\Form\PostForm;
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

    /**
     *
     */
    public function addAction()
    {
        $postForm = (new PostForm($this->request))->initFields();

        if ($this->request->isPostRequest()) {

            // Make sure no errors
            if ($postForm->isValid()) {
                // Validated
                if ($this->postModel->addPost($postForm->getFieldsAsArray())) {
                    $this->alertMessageService->flash('post_message', 'Post Added');
                    $this->urlHelper->redirectAction('post');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load the view
                $this->view('post/add', $postForm);
            }

        } else {
            $this->view('post/add', $postForm);
        }

    }


}