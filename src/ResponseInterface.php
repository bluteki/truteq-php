<?php

namespace Bluteki\TruTeq;

interface ResponseInterface
{
    /**
     * 
     * @param  int $type
     * @param  string $message
     * @param  float $cost
     * @param  string $reference
     * @return ResponseInterface
     */
    public static function create(int $type, string $message, float $cost = 0.0, string $reference = ""): ResponseInterface;

    /**
     * 
     * @return int
     */
    public function getType(): int;

    /**
     * 
     * @return string
     */
    public function getMsg(): string;

    /**
     * 
     * @return float
     */
    public function getCost(): float;

    /**
     * 
     * @return string
     */
    public function getRef(): string;

    /**
     * 
     * @return string
     */
    public function xml(): string;

    /**
     * 
     * @return string
     */
    public function __toString(): string;
}