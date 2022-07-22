<?php

use \Phalcon\Loader;
use \Phalcon\DI\FactoryDefault;
use \Phalcon\Mvc\View;
use Phalcon\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use \Phalcon\Mvc\Application;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Autoloader
$loader = new Loader();
    $loader->registerDirs([
        APP_PATH . '/controllers',
        APP_PATH . '/models',
    ]);
    
    $loader->register();
    
    $di = new FactoryDefault();
    $di->set('view', function () {
        $view = new View();
        $view->setViewsDir('../app/views/');
        return $view;
    });
    
    $di->set('url', function() {
        $url = new UrlProvider();
        $url->setBaseUri('/');
        return $url;
    });

    $di->set('db', function() {
        return new DbAdapter(
            [
                'host' => 'localhost',
                'port' => 3306,
                'username' => 'root',
                'password' => '12345',
                'dbname' => 'testing'
            ]
        );
    });
    
    $app = new Application($di);

try {
    $response = $app->handle($_SERVER['REQUEST_URI']);
    $response->send();
} catch (Exception $e) {
    echo json_encode($e, JSON_PRETTY_PRINT, 24);
    echo $e->getMessage() . PHP_EOL;
    echo $e->getLine() . PHP_EOL;
}