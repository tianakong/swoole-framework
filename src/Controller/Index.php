<?php
/**
 *
 * @link http://www.ketangshang.cn/
 * @author tiankong <tianakong@aliyun.com>
 * @version 1.0
 */
namespace src\Controller;

use Core\src\Abstracter\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->response->write('hello controller/index');
    }
}