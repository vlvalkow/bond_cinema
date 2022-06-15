<?php

namespace Vlvalkow\BondCinemaApi;

class App
{
    public function __construct(
        private Router $router,
        private Controller $controller,
    ) {
    }

    public function handle(Request $request): Response
    {
        $route = $this->router->route($request);

        if (!$route) {
            return new JsonResponse(status: 404);
        }

        return call_user_func_array([$this->controller, $route->getName()], [$request]);
    }
}
