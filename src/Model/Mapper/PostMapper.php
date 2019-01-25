<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-01-26
 * Time: 01:25
 */

namespace Model\Mapper;

use Entity\Post;
use Service\DataAdapter\StorageAdapter;

/**
 * Class PostMapper
 * @package Model\Mapper
 */
class PostMapper
{
    /**
     * @var StorageAdapter
     */
    private $adapter;
    /**
     * @param StorageAdapter $storage
     */
    public function __construct(StorageAdapter $storage)
    {
        $this->adapter = $storage;
    }
    /**
     * finds a post from storage based on ID and returns a Post object located
     * in memory. Normally this kind of logic will be implemented using the Repository pattern.
     * However the important part is in mapRowToPost() below, that will create a business object from the
     * data fetched from storage
     * @param int $id
     * @return Post
     */
    public function findById(int $id): Post
    {
        $result = $this->adapter->find($id);
        if ($result === null) {
            throw new \InvalidArgumentException("Post #$id not found");
        }

        return $this->mapRowToPost($result);
    }

    /**
     * @param array $row
     * @return Post
     */
    private function mapRowToPost(array $row): Post
    {
        return Post::fromState($row);
    }
}