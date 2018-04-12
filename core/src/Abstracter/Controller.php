<?php
/**
 *
 * @link http://www.ketangshang.cn/
 * @author tiankong <tianakong@aliyun.com>
 * @version 1.0
 */
namespace Core\src\Abstracter;

use Core\Http\Request;
use Core\Http\Response;

abstract class Controller
{
    protected $request;
    protected $response;

    public function __construct($actionName, Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
        $ref = new \ReflectionClass(static::class);
        if ($ref->hasMethod($actionName) && $ref->getMethod($actionName)->isPublic()) {
            $this->$actionName();
        }
    }
}