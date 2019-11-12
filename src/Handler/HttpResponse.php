<?php

namespace Handler;

class HttpResponse
{
    public static function HttpNotFound($msg = null)
    {
        http_response_code(404);

        echo json_encode(["error" => $msg]);
        die;
    }

    public static function HttpBadRequest($msg = null)
    {
        http_response_code(400);

        echo json_encode(["error" => $msg]);

        die;
    }
}