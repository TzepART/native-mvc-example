<?php

namespace Model;


use Kernel\Database;

/**
 * Class Post
 * @package App\Model
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
                             from posts as p          
                             order by p.created_at desc');

       return $this->db->resultSet();

   }

    /**
     * @param $id
     * @return mixed
     */
    public function getPostById($id)
   {
       $this->db->query('select * from posts where id = :id');
       $this->db->bind(':id',$id);
       return $this->db->single();
   }


    /**
     * @param $data
     * @return bool
     */
    public function addPost($data)
   {
       $this->db->query('INSERT INTO posts (title, body) values (:title, :body)');
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
     * @param $data
     * @return bool
     */
    public function updatePost($data)
   {
       $this->db->query('UPDATE posts SET title = :title, body = :body where id = :id');
       // Bind values
       $this->db->bind(':id', $data['id']);
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
    public function deletePost($id)
   {
       $this->db->query('DELETE FROM posts where id = :id');
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