<?php

namespace Vlvalkow\BondCinemaApi;

class Booking implements \JsonSerializable
{
    private string $name;

    private string $film;

    private \DateTime $datetime;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFilm(): string
    {
        return $this->film;
    }

    public function setFilm(string $film): self
    {
        $this->film = $film;

        return $this;
    }

    public function getDatetime(): \DateTime
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTime $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'film' => $this->film,
            'datetime' => $this->datetime->format(\DateTimeInterface::RFC3339),
        ];
    }
}
