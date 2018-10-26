<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26/10/2018
 * Time: 12:44
 */

namespace Model\Form;

use Model\Form\Field\StringField;


/**
 * Class PostForm
 * @package Model\Form
 */
class PostForm extends AbstractForm
{

    /**
     * @return $this
     */
    public function initFields()
    {
        foreach ($this->getFieldNames() as $fieldName) {
            if($this->request->isPostRequest()){
                $this->fields[$fieldName] = (new StringField($fieldName, $this->request->getPost()->getValueByKey($fieldName)))
                    ->checkValidField();
            }else{
                $this->fields[$fieldName] = new StringField($fieldName, '');
            }
        }

        return $this;
    }


    /**
     * @return array
     */
    protected function getFieldNames()
    {
        return [
          'title',
          'body'
        ];
    }
}