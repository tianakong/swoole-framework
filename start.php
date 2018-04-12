<?php
/**
 * 启动脚本
 * cli: php start.php
 *
 */

require'vendor/autoload.php';
$http = new Core\src\Servers();
$http->startServer();

