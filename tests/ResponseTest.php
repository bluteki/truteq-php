<?php

namespace Bluteki\TruTeq\Tests;

use Bluteki\TruTeq\Response;
use Bluteki\TruTeq\Tests\Mocks\ResponseMock;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    private ResponseMock $mock;

    protected function setUp(): void
    {
        $this->mock = new ResponseMock(
            ResponseMock::USSD_OPEN_SESSION,
            "Welcome to TruTeq USSD service.",
            2.34,
            "94h4398932"
        );
    }

    public function test_response_codes_constant_are_set(): void
    {
        $this->assertEquals(ResponseMock::USSD_OPEN_SESSION, Response::USSD_OPEN_SESSION);
        $this->assertEquals(ResponseMock::USSD_CLOSE_SESSION, Response::USSD_CLOSE_SESSION);
        $this->assertEquals(ResponseMock::USSD_REDIRECT, Response::USSD_REDIRECT);
    }

    public function test_create_response_with_all_constructor_parameters(): void
    {
        $response = new Response(
            $this->mock->type(),
            $this->mock->msg(),
            $this->mock->cost(),
            $this->mock->ref(),
        );

        $this->assertEquals($this->mock->type(), $response->getType());
        $this->assertEquals($this->mock->msg(), $response->getMsg());
        $this->assertEquals($this->mock->cost(), $response->getCost());
        $this->assertEquals($this->mock->ref(), $response->getRef());
    }

    public function test_create_response_with_static_create_method(): void
    {
        $response = Response::create(
            $this->mock->type(),
            $this->mock->msg(),
            $this->mock->cost(),
            $this->mock->ref(),
        );

        $this->assertEquals($this->mock->type(), $response->getType());
        $this->assertEquals($this->mock->msg(), $response->getMsg());
        $this->assertEquals($this->mock->cost(), $response->getCost());
        $this->assertEquals($this->mock->ref(), $response->getRef());
    }

    public function test_get_response_xml_document(): void
    {
        $response = Response::create(
            $this->mock->type(),
            $this->mock->msg(),
            $this->mock->cost(),
            $this->mock->ref(),
        );

        $this->assertEquals($this->mock->xml(), $response->xml());
    }

    public function test_convert_response_to_string(): void
    {
        $response = Response::create(
            $this->mock->type(),
            $this->mock->msg(),
            $this->mock->cost(),
            $this->mock->ref(),
        );

        $this->assertEquals($this->mock->xml(), (string) $response);
    }
}