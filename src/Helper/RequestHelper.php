<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26/10/2018
 * Time: 12:59
 */

namespace App\Helper;


/**
 * Class RequestHelper
 * @package Helper
 */
class RequestHelper
{
    /**
     * @var array
     */
    private $values;

    /**
     * RequestHelper constructor.
     * @param array $values
     */
    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * @param string $key
     * @return null
     */
    public function getValueByKey(string $key)
    {
        $value = $this->values[$key] ?? null;
        return $value;
    }

    /**
     * @param string $key
     * @param $value
     * @return $this
     */
    public function addValue(string $key, $value)
    {
        $this->values[$key] = $value;
        return $this;
    }

    /**
     * @param string $key
     * @return $this
     */
    public function removeValue(string $key)
    {
        if (isset($this->values[$key])) {
            unset($this->values[$key]);
        }
        return $this;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function existsValue(string $key)
    {
        if (isset($this->values[$key]) && $this->values[$key]) {
            return true;
        } else {
            return false;
        }
    }
}