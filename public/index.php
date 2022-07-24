<?php

use \Phalcon\Loader;
use \Phalcon\DI\FactoryDefault;
use \Phalcon\Mvc\View;
use Phalcon\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use \Phalcon\Mvc\Application;

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

// Sessions

// Autoloader
$loader = new Loader();
    $loader->registerDirs([
        APP_PATH . '/controllers',
        APP_PATH . '/models',
    ]);
    
    $loader->register();
    
    $di = new FactoryDefault();

    $di->set('view', function() {
        $db = new \Phalcon\Db\Adapter\Pdo\Mysql([
            'host' => 'localhost',
            'username' => 'root',
            'password' => '12345',
            'dbname' => 'testing'
        ]);
        return $db;
    });

    $di->set('view', function () {
        $view = new View();
        $view->setViewsDir('../app/views');
        return $view;
    });

    $di->setShared('session', function() {
        $session = new \Phalcon\Session\Manager();
        $files = new \Phalcon\Session\Adapter\Stream(
            [
                'savePath' => "C:\\tools\\nginx-1.23.0\\html\\test_php\\tmp"
            ]
        );
        $session->setAdapter($files);
        $session->start();

        return $session;
    });

    $di->set('modelsMetadata', function() {
        $serializerFactory = new \Phalcon\Storage\SerializerFactory();
        $adapterFactory = new \Phalcon\Cache\AdapterFactory($serializerFactory);
        $options = [
            'lifetime' => 86400,
            'prefix' => 'my-prefix'
        ];

        $metadata = new \Phalcon\Mvc\Model\MetaData\Apcu($adapterFactory, $options);
        $metadata->setStrategy(new \Phalcon\Mvc\Model\MetaData\Strategy\Introspection());

        return $metadata;
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