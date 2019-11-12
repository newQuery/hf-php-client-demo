<?php

namespace Controller;

use Handler\CustomTwigHandler;

class HomeController extends CustomTwigHandler
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $template = $this->twig->load('index.html.twig');
        return $template->render([]);
    }
}