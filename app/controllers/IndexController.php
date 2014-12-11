<?php
/**
 * Created by PhpStorm.
 * User: robertpodwikamac
 * Date: 11.12.14
 * Time: 23:06
 */

class IndexController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->test = "Hello phalcon volt template";
        $arr = ['ab','bc','cd','ed'];
        $this->view->arr = $arr;
    }

}