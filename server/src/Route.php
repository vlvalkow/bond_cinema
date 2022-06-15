<?php

namespace Vlvalkow\BondCinemaApi;

class Route
{
    public function __construct(
        private string $name,
        private string $httpMethod,
        private string $urlPattern,
    ) {
    }

    public function match(Request $request): bool
    {
        return preg_match($this->urlPattern, $request->getUri()) && $this->httpMethod === $request->getMethod();
    }

    public function getName(): string
    {
        return $this->name;
    }
}
