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
     * TODO separate on 2 methods
     * @return bool|mixed
     */
    public function isValidField()
    {
        if($this->value){
            return true;
        }else{
            $this->setError(printf('Please enter the %s', $this->name));
            return false;
        }
    }
}