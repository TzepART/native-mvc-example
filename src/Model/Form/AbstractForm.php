<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26/10/2018
 * Time: 13:38
 */

namespace Model\Form;


use Kernel\Request;
use Model\Form\Field\AbstractFormField;

/**
 * Class AbstractForm
 * @package Model\Form
 */
abstract class AbstractForm
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var AbstractFormField[]
     */
    protected $fields;

    /**
     * PostForm constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * @return bool
     */
    public function isValid()
    {
        $result = true;

        foreach ($this->fields as $field) {
            if(!$field->isValidField()){
                $result = false;
            }
        }

        return $result;
    }

    /**
     * @param string $name
     * @return AbstractFormField
     */
    public function getFieldByName(string $name)
    {
        return $this->fields[$name];
    }

    /**
     * @return AbstractFormField[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @return AbstractFormField[]
     */
    public function getFieldsAsArray(): array
    {
        $array = [];

        foreach ($this->fields as $field) {
            $array[$field->getName()] = $field->getValue();
        }

        return $array;
    }

    /**
     * @return $this
     */
    abstract public function initFieldsByRequest();


    /**
     * @param array $data
     * @return $this
     */
    abstract public function initFieldsByArray(array $data);


    /**
     * @return array
     */
    abstract protected function getFieldNames();
}