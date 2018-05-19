<?php

namespace App;

use SON\Init\Bootstrap;

class Route extends Bootstrap
{
    //rotas
    public function initRoutes()
    {
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index'
        );

        $routes['contact'] = array('route' => '/contact', 'controller' => 'indexController', 'action' => 'contact');

        $routes['product'] = array('route' => '/product', 'controller' => 'indexController', 'action' => 'product');


        $this->setRoutes($routes);
    }

}