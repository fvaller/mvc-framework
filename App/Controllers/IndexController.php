<?php

namespace App\Controllers;

use SON\Controller\Action;
use SON\DI\Container;

class IndexController extends Action
{

    public function index()
    {


        $this->render('index');        
    }


    public function product()
    {
        $books = Container::getModel('Book');
        $this->view->books = $books->fetchAll();

        $this->render('product');
    }

    public function contact()
    {

        /*$client = Container::getModel('Client');
        $this->view->clients = $client->find(2);*/

        //usando o container para evitar forte acoplamento
        $client = Container::getModel('Client');
        $this->view->clients = $client->fetchAll();

        $this->render('contact');        
    }


}