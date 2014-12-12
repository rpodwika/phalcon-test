<?php
/**
 * Created by PhpStorm.
 * User: robertpodwikamac
 * Date: 11.12.14
 * Time: 22:41
 */
error_reporting(E_ALL);

use \Phalcon\Config\Adapter\Ini as Config;

try {

    //Configuration
    $config = new Config('../app/config/config.ini');
    $loader = new \Phalcon\Loader();
    $loader->registerDirs($config->phalcon->toArray())->register();
    $loader->registerNamespaces([
        'Models'    => "../app/models/",
    ]);
    $di = new Phalcon\DI\FactoryDefault();

    $di->set('view', function() use ($config) {
        $view = new \Phalcon\Mvc\View();
        $view->setViewsDir($config->phalcon->viewsDir);
        $voltEng     = $config->voltengines->toArray();
        $suffixs = [];

        foreach($voltEng as $configKey => &$configVal) {
            foreach($configVal as $suffix => &$handler){
                $suffixs['.'.$suffix] = $handler;
            }
        }

        $view->registerEngines($suffixs);
        unset($arr);
        unset($suffixs);
        return $view;
    });

    $di->set('db', function() use ($config) {
        return new \Phalcon\Db\Adapter\Pdo\Mysql($config->database->toArray());
    });

    //Setup a base URI so that all generated URIs include the "tutorial" folder
    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        return $url;
    });

    //Handle the request
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}