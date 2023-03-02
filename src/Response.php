<?php

namespace Bluteki\TruTeq;

use DOMDocument;

class Response implements ResponseInterface
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

    public static function create(int $type, string $message, float $cost = 0.0, string $reference = ""): ResponseInterface
    {
        return new static($type, $message, $cost, $reference);
    }

    public function getType(): int
    {
        return $this->type;
    }

    public function getMsg(): string
    {
        return $this->message;
    }

    public function getCost(): float
    {
        return $this->cost;
    }

    public function getRef(): string
    {
        return $this->reference;
    }

    public function xml(): string
    {
        $xml = new DOMDocument('1.0');

        $ussd = $xml->createElement("ussd");
        $type = $xml->createElement("type", $this->getType());
        $msg = $xml->createElement("msg", $this->getMsg());
        $premium = $xml->createElement("premium");
        $cost = $xml->createElement("cost", $this->getCost());
        $ref = $xml->createElement("ref", $this->getRef());

        $ussd->appendChild($type);
        $ussd->appendChild($msg);
        $premium->appendChild($cost);
        $premium->appendChild($ref);
        $ussd->append($premium);
        $xml->append($ussd);
        
        return $xml->saveXML();
    }

    public function __toString(): string
    {
        return $this->xml();
    }
}