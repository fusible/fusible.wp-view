<?php
// @codingStandardsIgnoreFile

namespace Fusible\WpView;


use Aura\View;
use Aura\Html;

class Container
{
    protected $render;

    protected $view;

    protected $helpers;


    public function getRender()
    {
        if (! $this->render) {
            $this->render = new Render($this->getView());
        }
        return $this->render;
    }

    public function getView()
    {
        if (! $this->view) {
            $factory = new View\ViewFactory;
            $this->view = $factory->newInstance($this->getHelpers());
            $this->configView();
        }
        return $this->view;
    }

    protected function configView()
    {
        $theme = get_stylesheet_directory();
        $this->view->getViewRegistry()->setPaths([$theme]);
        $this->view->getLayoutRegistry()->setPaths([$theme . '/layouts']);
    }

    public function getHelpers()
    {
        if (! $this->helpers) {
            $factory = new Html\HelperLocatorFactory;
            $this->helpers = $factory->newInstance();
        }
        return $this->helpers;
    }

}
