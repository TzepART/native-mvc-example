<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-01-26
 * Time: 01:23
 */

namespace Service\DataAdapter;


/**
 * Class StorageAdapter
 * @package Service\DataAdapter
 */
class StorageAdapter
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * StorageAdapter constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param int $id
     *
     * @return array|null
     */
    public function find(int $id)
    {
        if (isset($this->data[$id])) {
            return $this->data[$id];
        }

        return null;
    }

}