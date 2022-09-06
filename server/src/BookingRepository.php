<?php

namespace Vlvalkow\BondCinemaApi;

class BookingRepository extends AbstractRepository
{
    public function __construct(FileSystem $fileSystem)
    {
        parent::__construct(__DIR__ . '/../database/bookings.json', $fileSystem);
    }
}
