<?php
// @codingStandardsIgnoreFile

namespace Fusible\WpView;

use Aura\View\View;

class Render
{

    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    public function register()
    {
        add_filter("template_include", $this);
    }

    public function __invoke($template)
    {
        $template = $this->getTemplate($template);
        $this->view->setView($template);
        echo $this->view->__invoke();
        return false;
    }

    protected function getTemplate($template)
    {
        $stylesheetDir = trailingslashit(get_stylesheet_directory());
        $template = str_replace($stylesheetDir, "", $template);
        $parts = explode(".", $template);
        return current($parts);
    }
}
