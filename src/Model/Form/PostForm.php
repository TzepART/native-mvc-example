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
    public function initFieldsByRequest()
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
     * @param array $data
     * @return $this
     */
    public function initFieldsByArray(array $data)
    {
        foreach ($this->getFieldNames() as $fieldName) {
            if(isset($data[$fieldName]) && $data[$fieldName]){
                $this->fields[$fieldName] = new StringField($fieldName, $data[$fieldName]);
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