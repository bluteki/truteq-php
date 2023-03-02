<?php

namespace Bluteki\TruTeq\Tests\Mocks;

class ResponseMock
{
    public const USSD_OPEN_SESSION = 2;
    public const USSD_CLOSE_SESSION = 3;
    public const USSD_REDIRECT = 5;

    private int $type;

    private string $message;

    private float $cost;

    private string $reference;

    public function __construct(int $type, string $message, float $cost = 0.0, string $reference = "")
    {
        $this->type = $type;
        $this->message = $message;
        $this->cost = $cost;
        $this->reference = $reference; 
    }

    public function type(): int
    {
        return $this->type;
    }

    public function msg(): string
    {
        return $this->message;
    }

    public function cost(): float
    {
        return $this->cost;
    }

    public function ref(): string
    {
        return $this->reference;
    }

    public function xml(): string
    {
        return
        "<?xml version=\"1.0\"?>\n" .
        "<ussd>" .
        "<type>{$this->type}</type>" . 
        "<msg>{$this->message}</msg>" .
        "<premium>" .
        "<cost>{$this->cost}</cost>" .
        "<ref>{$this->reference}</ref>" .
        "</premium>" .
        "</ussd>\n";
    }
}