<?php

namespace Vlvalkow\BondCinemaApi;

use JetBrains\PhpStorm\Pure;

class JsonResponse extends Response
{
    #[Pure]
    public function __construct(
        protected ?string $content = null,
        protected int $status = 200,
        protected array $headers = [
            'Access-Control-Allow-Origin: *',
            'Content-Type: application/json; charset=utf-8',
        ],
    ) {
        parent::__construct($content, $status, $headers);
    }
}
