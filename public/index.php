<?php
/**
 * Created by PhpStorm.
 * User: robertpodwikamac
 * Date: 11.12.14
 * Time: 22:41
 */
error_reporting(E_ALL);

use Phalcon\Mvc\View,
    Phalcon\Mvc\View\Engine\Volt,
    \Phalcon\Config\Adapter\Ini as Config;

try {

    //Configuration
    $config = new Config('../app/config/config.ini');
    $loader = new \Phalcon\Loader();
    $loader->registerDirs($config->phalcon->toArray())->register();

    /**
     *  @TODO get this from configuration file
     */
    $loader->registerNamespaces([
        'Models'    => "../app/models/",
    ]);

    $di = new Phalcon\DI\FactoryDefault();

    $di->set('voltService', function($view, $di) use($config){
        $volt = new Volt($view, $di);
        $volt->setOptions(array(
            "compiledPath"      => $config->view->compiledPath,
            "compiledExtension" => $config->view->compliedExtension,
        ));
        return $volt;
    });

    $di->set('view', function() use($config) {
        $view = new View();
        $view->setViewsDir($config->view->dir);
        $view->registerEngines(array(
            ".volt" => 'voltService'
        ));
        return $view;
    });

    $di->set('db', function() use ($config) {
        return new \Phalcon\Db\Adapter\Pdo\Mysql($config->database->toArray());
    });

    $di->set('url', function(){
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        return $url;
    });

    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
    /**
     * @TODO Logging exceptions
     */
    echo "PhalconException: ", $e->getMessage();
}