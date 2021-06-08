<?php
namespace App\Message;

class RequestNotification
{
    public function __construct(
        private int $type,
        private string $id,
    ) {}

    public function getType(): int
    {
        return $this->type;
    }

    public function getId(): string
    {
        return $this->id;
    }
}