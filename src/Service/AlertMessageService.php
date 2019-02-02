<?php

namespace App\Service;


use App\Helper\SessionHelper;


/**
 * Class AlertMessageService
 * @package Service
 */
class AlertMessageService
{
    /**
     * @var SessionHelper
     */
    private $sessionHelper;

    /**
     * AlertMessageService constructor.
     * @param SessionHelper $sessionHelper
     */
    public function __construct(SessionHelper $sessionHelper)
    {
        $this->sessionHelper = $sessionHelper;
    }

    /**
     * Flash message helper
     * Example flash('register_success','You are now registered!')
     * Display in View - <php echo flash('register_success'); >
     * @param string $name
     * @param string $message
     * @param string $class
     */
    public function flash($name = '', $message = '', $class = 'alert alert-success alert-dismissible fade show')
    {
        if ($name) {
            if ($message && !$this->sessionHelper->existsValue('name')) {
                if ($this->sessionHelper->existsValue($name)) {
                    $this->sessionHelper->removeValue($name);
                }
                if ($this->sessionHelper->existsValue($name . '_class')) {
                    $this->sessionHelper->removeValue($name . '_class');
                }
                $this->sessionHelper->addValue($name, $message)
                    ->addValue($name . '_class', $class);
            } elseif (empty($mesage) && $this->sessionHelper->existsValue($name)) {
                $class = $this->sessionHelper->getValueByKey($name . '_class');
                echo '<div class="' . $class . '" id="msg-flash" role="alert">' . $this->sessionHelper->getValueByKey($name) . '
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span></button>
                 </div>';

                $this->sessionHelper->removeValue($name)
                    ->removeValue($name . '_class');
            }
        }
    }
}