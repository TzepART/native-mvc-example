<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 2019-02-12
 * Time: 23:05
 */

namespace App\Exception\Http;

use App\Exception\ExceptionCode;

/**
 * Class HttpNotFoundException
 * @package App\Exception
 */
class HttpNotFoundException extends \Exception
{
    const DEFAULT_MESSAGE = "Not found error";
    const DEFAULT_CODE = ExceptionCode::NOT_FOUND_CODE;
}