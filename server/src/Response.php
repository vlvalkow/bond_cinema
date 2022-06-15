<?php

namespace Vlvalkow\BondCinemaApi;

class Response
{
    public function __construct(
        protected ?string $content = null,
        protected int $status = 200,
        protected array $headers = [],
    ) {
    }

    public function send()
    {
        http_response_code($this->status);

        foreach ($this->headers as $header) {
            header($header);
        }

        echo $this->content;
    }
}
