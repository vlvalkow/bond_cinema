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

    public function getStatus()
    {
        return $this->status;
    }

    public function getContentType()
    {
        return $this->getHeader('Content-Type');
    }

    public function getContent()
    {
        return $this->content;
    }

    public function send()
    {
        http_response_code($this->status);

        foreach ($this->headers as $header) {
            header($header);
        }

        echo $this->content;
    }

    private function getHeader(string $headerName)
    {
        foreach ($this->headers as $header) {
            if (strpos($header, $headerName) === false) {
                continue;
            }

            $parts = explode(':', $header);

            if (!$parts) {
                return null;
            }

            return trim($parts[1]);
        }

        return null;
    }
}
