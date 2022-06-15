<?php

use Vlvalkow\BondCinemaApi\App;
use Vlvalkow\BondCinemaApi\Controller;
use Vlvalkow\BondCinemaApi\Request;
use Vlvalkow\BondCinemaApi\Route;
use Vlvalkow\BondCinemaApi\Router;

require __DIR__ . '/../vendor/autoload.php';

$request = new Request(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD'],
    $_GET
);

$app = new App(
    new Router([
        new Route('getBookings', 'GET', '/\/bookings/'),
    ]),
    new Controller
);
$response = $app->handle($request);
$response->send();
