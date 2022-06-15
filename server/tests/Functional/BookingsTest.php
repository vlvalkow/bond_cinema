<?php

namespace Functional;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\HttpClient;

class BookingsTest extends TestCase
{
    public function test_whenGetBookings_shouldReturnSuccessfulResponse()
    {
        $client = HttpClient::create();

        $response = $client->request('GET', 'http://localhost/bookings');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
