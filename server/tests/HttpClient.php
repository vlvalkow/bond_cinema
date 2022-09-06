<?php

namespace Vlvalkow\BondCinemaApi\Tests;

use Vlvalkow\BondCinemaApi\Response;

class HttpClient
{
    public function request(string $method, string $uri, array $body = []): Response
    {
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['REQUEST_BODY'] = json_encode($body);

        return require dirname(__DIR__) . '/public/index.php';
    }
}
