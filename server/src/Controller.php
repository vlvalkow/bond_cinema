<?php

namespace Vlvalkow\BondCinemaApi;

class Controller
{
    public function __construct(
        private BookingRepository $bookingRepository
    )
    {
    }

    public function getBookings(): JsonResponse
    {
        return new JsonResponse(
            json_encode($this->bookingRepository->findAll())
        );
    }

    public function createBooking(Request $request): JsonResponse
    {
        $bookingData = $request->toArray();

        $booking = new Booking();
        $booking
            ->setName($bookingData['name'])
            ->setDatetime(new \DateTime($bookingData['datetime']))
            ->setFilm($bookingData['film']);

        $this->bookingRepository->create($booking);

        return new JsonResponse(status: 201);
    }
}
