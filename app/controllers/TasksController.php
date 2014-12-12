<?php
/**
 * Created by PhpStorm.
 * User: robertpodwikamac
 * Date: 12.12.14
 * Time: 01:01
 */

class TasksController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
         $this->view->tasks = Models\Tasks::find();
    }
}