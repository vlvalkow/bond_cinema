<?php

use Vlvalkow\BondCinemaApi\App;
use Vlvalkow\BondCinemaApi\BookingRepository;
use Vlvalkow\BondCinemaApi\Controller;
use Vlvalkow\BondCinemaApi\FileSystem;
use Vlvalkow\BondCinemaApi\Request;
use Vlvalkow\BondCinemaApi\Route;
use Vlvalkow\BondCinemaApi\Router;

require __DIR__ . '/../vendor/autoload.php';

$request = new Request(
    $_SERVER['REQUEST_URI'],
    $_SERVER['REQUEST_METHOD'],
    $_GET,
    $_SERVER['REQUEST_BODY'] ?? null,
);

$app = new App(
    new Router([
        new Route('getBookings', 'GET', '/\/bookings/'),
        new Route('createBooking', 'POST', '/\/bookings/'),
    ]),
    new Controller(new BookingRepository(new FileSystem()))
);
$response = $app->handle($request);

if (php_sapi_name() === 'cli') {
    return $response;
}

$response->send();
