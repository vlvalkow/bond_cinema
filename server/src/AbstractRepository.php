<?php

namespace Vlvalkow\BondCinemaApi;

abstract class AbstractRepository
{
    public function __construct(
        private $filename,
        private FileSystem $fileSystem
    ) {
    }

    public function create(\JsonSerializable $jsonSerializable): void
    {
        $records = $this->findAll();

        $records[] = $jsonSerializable;

        $data = json_encode($records);

        $this->fileSystem->write($this->filename, $data);
    }

    public function findAll(): array
    {
        try {
            $contents = $this->fileSystem->read($this->filename);

            return json_decode($contents) ?? [];
        } catch (\InvalidArgumentException) {
        }

        return [];
    }

    public function clear()
    {
        $this->fileSystem->clear($this->filename);
    }
}
