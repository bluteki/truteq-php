<?php

namespace Bluteki\TruTeq\Tests\Mocks;

class RequestMock
{
    public const USSD_NEW_REQUEST        = 1;
    public const USSD_EXISTING_SESSION   = 2;
    public const USSD_SESSION_CANCELLED  = 3;
    public const USSD_SESSION_TIMED_OUT  = 4;
    public const USSD_RATE_CHARGE_FAILED = 10;

    /**
     * @var int $sessionId
     */
    private int $sessionId;

    /**
     * @var string msisdn
     */
    private int $msisdn;

    /**
     * @var string $message
     */
    private string $message;

    /**
     * @var int $type
     */
    private int $type;

    /**
     * 
     */
    public function __construct(int $sessionId, int $msisdn, string $message, int $type)
    {
        $this->sessionId = $sessionId;
        $this->msisdn = $msisdn;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * 
     * @return int
     */
    public function sessionId(): int
    {
        return $this->sessionId;
    }

    /**
     * 
     * @return int
     */
    public function msisdn(): int
    {
        return $this->msisdn;
    }

    /**
     * 
     * @return string
     */
    public function msg(): string
    {
        return $this->message;
    }

    /**
     * 
     * @return int
     */
    public function type(): int
    {
        return $this->type;
    }

    /**
     * 
     * @return string
     */
    public function xml(): string
    {
        return
        "<ussd>\n" .
        "   <msisdn>{$this->msisdn}</msisdn>\n" .
        "   <sessionid>{$this->sessionId}</sessionid>\n" .
        "   <type>{$this->type}</type>\n" .
        "   <msg>{$this->message}</msg>\n" .
        "</ussd>";
    }
}