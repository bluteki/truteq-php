<?php

namespace Bluteki\TruTeq\Tests;

use Bluteki\TruTeq\Request;
use Bluteki\TruTeq\RequestInterface;
use Bluteki\TruTeq\Tests\Mocks\RequestMock;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    private RequestMock $mock;

    protected function setUp(): void
    {
        $this->mock = new RequestMock(
            4321423523,
            2565745654,
            "Welcome To TruTeq USSD Service.",
            RequestMock::USSD_EXISTING_SESSION
        );
    }

    public function test_request_codes_constants_are_set(): void
    {
        $this->assertEquals(RequestMock::USSD_NEW_REQUEST, Request::USSD_NEW_REQUEST);
        $this->assertEquals(RequestMock::USSD_EXISTING_SESSION, Request::USSD_EXISTING_SESSION);
        $this->assertEquals(RequestMock::USSD_SESSION_CANCELLED, Request::USSD_SESSION_CANCELLED);
        $this->assertEquals(RequestMock::USSD_SESSION_TIMED_OUT, Request::USSD_SESSION_TIMED_OUT);
        $this->assertEquals(RequestMock::USSD_RATE_CHARGE_FAILED, Request::USSD_RATE_CHARGE_FAILED);
    }

    public function test_get_xml_from_request(): void
    {
        $request = new Request($this->mock->xml());

        $this->assertEquals($this->mock->xml(), $request->xml());
    }

    public function test_create_request_with_static_create_method(): void
    {
        $request = Request::create($this->mock->xml());

        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertEquals($this->mock->xml(), $request->xml());
    }

    public function test_get_session_id_from_request(): void
    {
        $request = Request::create($this->mock->xml());

        $this->assertEquals($this->mock->sessionId(), $request->sessionId());
    }

    public function test_get_msisdn_from_request(): void
    {
        $request = Request::create($this->mock->xml());

        $this->assertEquals($this->mock->msisdn(), $request->msisdn());
    }

    public function test_get_request_type(): void
    {
        $request = Request::create($this->mock->xml());

        $this->assertEquals($this->mock->type(), $request->type());
    }

    public function test_get_message_from_request(): void
    {
        $request = Request::create($this->mock->xml());

        $this->assertEquals($this->mock->msg(), $request->msg());
    }
}