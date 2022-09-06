<?php

namespace Vlvalkow\BondCinemaApi;

class Request
{
    public function __construct(
        private string $uri,
        private string $method,
        private array $parameters = [],
        private $content = null
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

    public function getContent(): bool|string
    {
        if (\is_string($this->content)) {
           return $this->content;
        }

        return file_get_contents('php://input');
    }

    public function toArray()
    {
        return json_decode($this->getContent(), true);
    }
}
