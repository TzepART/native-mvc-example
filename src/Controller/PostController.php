<?php

namespace App\Controller;

use App\Kernel\BaseController;
use App\Model\Form\PostForm;
use App\Model\Post;
use App\Service\AlertMessageService;
use App\Service\SecurityService;

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
     * @var SecurityService
     */
    private $securityService;


    /**
     * Posts constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->postModel = new Post();
        $this->alertMessageService = new AlertMessageService($this->sessionHelper);
        $this->securityService = new SecurityService($this->sessionHelper);
    }

    /**
     * Page with posts list
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
     * Show post page
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
     * Add post
     * @throws \Exception
     */
    public function addAction()
    {
        //check that user is logged
        if(!$this->securityService->isLoggedIn()){
            $this->urlHelper->redirectAction('user/login');
        }

        $postForm = (new PostForm($this->request))->initFieldsByRequest();

        if ($this->request->isPostRequest()) {

            // Make sure no errors
            if ($postForm->isValid()) {
                // Validated
                if ($this->postModel->addPost($postForm->getFieldsAsArray())) {
                    $this->alertMessageService->flash('post_message', 'Post Added');
                    $this->urlHelper->redirectAction('post');
                } else {
                    throw new \Exception();
                }
            } else {
                // Load the view
                $this->view('post/add', $postForm);
            }

        } else {
            $this->view('post/add', $postForm);
        }

    }

    /**
     * Update data of post
     * @param $id
     * @throws \Exception
     */
    public function editAction($id)
    {
        //check that user is logged
        if(!$this->securityService->isLoggedIn()){
            $this->urlHelper->redirectAction('user/login');
        }

        $postForm = (new PostForm($this->request))->initFieldsByRequest();

        if ($this->request->isPostRequest()) {

            // Make sure no errors
            if ($postForm->isValid()) {
                // Validated
                if ($this->postModel->updatePostById($id,$postForm->getFieldsAsArray())) {
                    $this->alertMessageService->flash('post_message', 'Post Updated');
                    $this->urlHelper->redirectAction('post');
                } else {
                    throw new \Exception();
                }
            } else {
                // Load the view
                $this->view('post/edit', [$postForm,$id]);
            }

        } else {
            // Get existing post from model
            $post = $this->postModel->getPostById($id);
            $data = [
                'title' => $post->title,
                'body' => $post->body,
            ];

            $postForm = (new PostForm($this->request))->initFieldsByArray($data);

            $this->view('post/edit', [$postForm,$id]);
        }

    }

    /**
     * Remove post
     * @param $id
     * @throws \Exception
     */
    public function deleteAction($id)
    {
        if ($this->request->isPostRequest()) {
            if ($this->postModel->deletePost($id)) {
                $this->alertMessageService->flash('post_message', 'Post removed');
                $this->urlHelper->redirectAction('post');
            } else {
                throw new \Exception();
            }

        } else {
            $this->urlHelper->redirectAction('post');
        }
    }



}