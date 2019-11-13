<?php

namespace Handler;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class CustomTwigHandler
{
    public const PATH_TEMPLATES = "src/templates";
    public const PATH_CACHES = "caches";

    /** @var string */
    public $template;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(self::PATH_TEMPLATES);
        $this->twig = new Environment($this->loader, [
//            'cache' => self::PATH_CACHES,
        ]);
    }
}