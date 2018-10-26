<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26/10/2018
 * Time: 12:49
 */

namespace Model\Form\Field;


/**
 * Class StringField
 * @package Model\Form\Field
 */
class StringField extends AbstractFormField
{
    /**
     * @return $this
     */
    public function checkValidField()
    {
        if(empty(trim($this->value))){
            $this->setError(sprintf('Please enter the %s', $this->name));
        }

        return $this;
    }

}