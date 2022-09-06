<?php

namespace Vlvalkow\BondCinemaApi;

class FileSystem
{
    public function read(string $filename): string
    {
        $contents = @file_get_contents($filename);

        if ($contents === false) {
            throw new \InvalidArgumentException(error_get_last()['message'] ?? '');
        }

        return $contents;
    }

    public function write(string $filename, string $data): void
    {
        if (@file_put_contents($filename, $data) === false) {
            throw new \InvalidArgumentException(error_get_last()['message'] ?? '');
        };
    }

    public function delete(string $filename)
    {
        unlink($filename);
    }

    public function clear(string $filename): void
    {
        $this->write($filename, "");
    }
}
