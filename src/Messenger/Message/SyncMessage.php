<?php

declare(strict_types=1);

namespace App\Messenger\Message;

class SyncMessage
{
    private $data;

    public function __construct(string $data)
    {
        $this->data = $data;
    }

    public function getData(): string
    {
        return $this->data;
    }
}
