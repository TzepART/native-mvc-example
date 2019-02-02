<?php

namespace App\Helper;


/**
 * Class DateTimeHelper
 * @package Helper
 */
class DateTimeHelper
{

    /**
     * Helper to format date/time
     * @param $date
     * @param string $format
     * @return false|string
     */
    static function helper_format_date($date, $format = APP_DATE_TIME_FORMAT){
        return date($format, strtotime($date));
    }

}