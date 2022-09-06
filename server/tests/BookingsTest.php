<?php

namespace Vlvalkow\BondCinemaApi\Tests;

use DateTime;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use Vlvalkow\BondCinemaApi\Booking;
use Vlvalkow\BondCinemaApi\JsonResponse;
use Vlvalkow\BondCinemaApi\BookingRepository;
use Vlvalkow\BondCinemaApi\FileSystem;

class BookingsTest extends TestCase
{
    protected function setUp(): void
    {
        $this->getRepository()->clear();
    }

    public function test_whenGetBookings_shouldReturnSuccessfulResponse()
    {
        $booking = new Booking();
        $booking
            ->setName('John Doe')
            ->setFilm('Skyfall')
            ->setDatetime(new DateTime());

        $this->getRepository()->create($booking);
        
        $client = new HttpClient();

        /** @var JsonResponse $response */
        $response = $client->request('GET', '/bookings');

        $this->assertEquals(200, $response->getStatus());
        $this->assertEquals('application/json; charset=utf-8', $response->getContentType());
        $this->assertEquals([
            [
                'name' => $booking->getName(),
                'film' => $booking->getFilm(),
                'datetime' => $booking->getDatetime()->format(DateTimeInterface::RFC3339),
            ],
        ], $response->getDecodedContent());
    }

    public function test_whenCreateBookings_shouldReturnSuccessfulResponse()
    {
        $repository = $this->getRepository();

        $this->assertCount(0, $repository->findAll());

        $client = new HttpClient();

        /** @var JsonResponse $response */
        $response = $client->request('POST', '/bookings', [
            'name' => 'John Doe',
            'film' => 'Casino Royale',
            'datetime' => (new \DateTime())->format(DateTimeInterface::RFC3339),
        ]);

        $this->assertEquals(201, $response->getStatus());
        $this->assertEquals('application/json; charset=utf-8', $response->getContentType());
        
        $this->assertCount(1, $repository->findAll());
    }

    private function getRepository(): BookingRepository
    {
        return new BookingRepository(new FileSystem());
    }
}
