<?php

namespace Vlvalkow\BondCinemaApi;

class Router
{
    public function __construct(
        private array $routes = []
    ) {
    }

    public function route(Request $request): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->match($request)) {
                return $route;
            }
        }

        return null;
    }
}
