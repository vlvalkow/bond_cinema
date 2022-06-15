<?php

namespace Vlvalkow\BondCinemaApi;

class Request
{
    public function __construct(
        private string $uri,
        private string $method,
        private array $parameters = []
    ) {
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
