<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26/10/2018
 * Time: 12:45
 */

namespace Model\Form\Field;

/**
 * Class AbstractFormField
 * @package Model\Form\Field
 */
abstract class AbstractFormField
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var
     */
    protected $value;

    /**
     * @var string
     */
    protected $error = '';

    /**
     * AbstractFormField constructor.
     * @param string $name
     * @param $value
     */
    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    abstract public function isValidField();

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param string $error
     * @return $this
     */
    public function setError(string $error)
    {
        $this->error = $error;
        return $this;
    }
}