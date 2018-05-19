<?php

namespace SON\Controller;


abstract class Action
{
    protected $view;
    private $action;

    public function __construct()
    {
        $this->view = new \stdClass();
    }

    protected function render($action, $layout = true)
    {
        $this->action = $action;

        $layout_file = '../App/Views/layout.phtml';

        if ($layout == true && file_exists($layout_file)) {
            include_once($layout_file);
        } else {
            $this->content();
        }

    }

    protected function content()
    {

        $current = get_class($this);

        //pega apenas o nome do controller
        $singleClassName = strtolower(
            str_replace('Controller', '',
                str_replace('App\\Controllers\\', '', $current)
            )
        );

        include_once '../App/Views/' . $singleClassName . '/' . $this->action . '.phtml';
    }

}