<?php

namespace Model;


use Kernel\Database;

/**
 * Class Post
 * @package Model
 */
class Post
{
    /**
     * @var Database
     */
    private $db;

    /**
     * Post constructor.
     */
    public function __construct()
   {
       $this->db = new Database();
   }

    /**
     * @return mixed
     */
    public function getPosts()
   {
       $this->db->query('select p.id as post_id, p.title, p.body, p.created_at 
                             from post as p          
                             order by p.created_at desc');

       return $this->db->resultSet();

   }

    /**
     * @param $id
     * @return mixed
     */
    public function getPostById($id)
   {
       $this->db->query('select * from post where id = :id');
       $this->db->bind(':id',$id);
       return $this->db->single();
   }


    /**
     * @param $data
     * @return bool
     */
    public function addPost($data): bool
   {
       $this->db->query('INSERT INTO post (title, body) values (:title, :body)');
       // Bind values
       $this->db->bind(':title', $data['title']);
       $this->db->bind(':body', $data['body']);

       // Execute
       if( $this->db->execute() ){
           return true;
       } else {
           return false;
       }
   }

    /**
     * @param int $postId
     * @param $data
     * @return bool
     */
    public function updatePostById(int $postId, $data): bool
   {
       $this->db->query('UPDATE post SET title = :title, body = :body where id = :id');
       // Bind values
       $this->db->bind(':id', $postId);
       $this->db->bind(':title', $data['title']);
       $this->db->bind(':body', $data['body']);

       // Execute
       if( $this->db->execute() ){
           return true;
       } else {
           return false;
       }
   }

    /**
     * @param $id
     * @return bool
     */
    public function deletePost($id): bool
   {
       $this->db->query('DELETE FROM post where id = :id');
       // Bind values
       $this->db->bind(':id', $id);

       // Execute
       if( $this->db->execute() ){
           return true;
       } else {
           return false;
       }
   }
}