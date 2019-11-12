<?php

use Controller\HomeController;
use Controller\UserController;
use Handler\HttpResponse;

require_once __DIR__.'/vendor/autoload.php';

const HF_API_KEY = "YOUR_KEY_HERE";

require_once __DIR__ . '/vendor/autoload.php';

$klein = new \Klein\Klein();

/** @var Klein\Request $request */
$klein->respond('POST', '/user', function ($request) {
    if(null === $request->uid) {
        HttpResponse::HttpBadRequest("You must enter an UID");
    }

    if(false === ctype_digit($request->uid)) {
        HttpResponse::HttpBadRequest("UID must be an integer");
    }

    return (new UserController(HF_API_KEY))->getOne(intval($request->uid));
});


$klein->respond('GET', '/', function () {
    return (new HomeController())->index();
});


$klein->dispatch();