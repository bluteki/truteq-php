<?php

namespace Bluteki\TruTeq;

use DOMDocument;
use SimpleXMLElement;

class Request implements RequestInterface
{
    public const USSD_NEW_REQUEST = 1;
    public const USSD_EXISTING_SESSION = 2;
    public const USSD_SESSION_CANCELLED = 3;
    public const USSD_SESSION_TIMED_OUT = 4;
    public const USSD_RATE_CHARGE_FAILED = 10;

    /**
     * @var string $xml
     */
    private string $xml;

    /**
     * @var SimpleXMLElement $document
     */
    private SimpleXMLElement $document;

    /**
     * @param string $xml
     */
    public function __construct(string $xml)
    {
        $this->document = new SimpleXMLElement($this->xml = $xml);
    }

    public static function create(string $xml): RequestInterface
    {
        return new static($xml);
    }

    public function sessionid(): int
    {
        return (int) $this->document->sessionid;
    }

    public function msisdn(): int
    {
        return (int) $this->document->msisdn;
    }

    public function type(): int
    {
        return (int) $this->document->type;
    }

    public function msg(): string
    {
        return (string) $this->document->msg;
    }

    public function xml(): string
    {
        return $this->xml;
    }
}