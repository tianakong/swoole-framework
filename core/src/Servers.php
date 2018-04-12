<?php

/**
 *
 * @link http://www.ketangshang.cn/
 * @author tiankong <tianakong@aliyun.com>
 * @version 1.0
 */
namespace Core\src;

use Core\Http\Request;
use Core\Http\Response;

class Servers
{
    /**
     * 启动swoole http服务，把swoole 请求转换 psr请求；实例化控制器运行
     */
    public function startServer()
    {
        $dispatcher = new Dispatcher();
        $http = new \swoole_http_server("127.0.0.1", 9501);
        $http->on('request', function (\swoole_http_request $request, \swoole_http_response $response) use ($dispatcher) {
            $requestPsr7 = new Request($request);
            $responsePsr7 = new Response($response);
            $dispatcher->dispatch($requestPsr7, $responsePsr7);
            $responsePsr7->response();
            $responsePsr7->end(true);
        });
        $http->set(['daemonize'=>0]); //是否开启守护进程
        $http->start();
    }
}