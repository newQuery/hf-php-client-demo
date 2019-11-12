<?php

namespace Controller;

use Handler\CustomTwigHandler;
use Handler\HttpResponse;
use HFClient\Client;

class UserController extends CustomTwigHandler
{

    /**
     * @var Client
     */
    private $client;

    public function __construct(string $apiKey)
    {
        parent::__construct();
        $this->client = new Client($apiKey);
    }

    public function getOne($uid)
    {
        $result = $this->client->getUser($uid);

        if(true === $result['success']) {
            $result['result']['avatar'] = sprintf("https://hackforums.net/%s", trim($result['result']['avatar'], './'));

            $result['result']['displaygroup'] = $this->client->getGroup($result['result']['displaygroup'])['result'];

            $result['uid'] = $uid;

            return $this->twig->render('user.html.twig', $result);
        } else {
            HttpResponse::HttpNotFound("UID not matching");
        }

    }
}