<?php

namespace Vlvalkow\BondCinemaApi;

class Controller
{
    public function getBookings(): JsonResponse
    {
        return new JsonResponse(
            json_encode([
                [
                    'title' => 'Lorem',
                ],
                [
                    'title' => 'Ipsum',
                ],
                [
                    'title' => 'Dolor',
                ],
                [
                    'title' => 'Sit',
                ],
                [
                    'title' => 'Amet',
                ],
            ])
        );
    }
}
