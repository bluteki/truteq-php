<?php

namespace Bluteki\TruTeq;

interface RequestInterface
{
    /**
     * 
     * @return RequestInterface
     */
    public static function create(string $xml): RequestInterface;

    /**
     * 
     * @return int
     */
    public function sessionId(): int;

    /**
     * 
     * @return int
     */
    public function msisdn(): int;

    /**
     * 
     * @return int
     */
    public function type(): int;

    /**
     * 
     * @return string
     */
    public function msg(): string;

    /**
     * 
     * @return string
     */
    public function xml(): string;
}