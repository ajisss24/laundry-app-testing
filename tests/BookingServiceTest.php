<?php

use PHPUnit\Framework\TestCase;

require_once 'BookingService.php';

class BookingServiceTest extends TestCase {

    public function testValidatePayment() {

        // mock statement
        $stmtMock = $this->getMockBuilder(stdClass::class)
                        ->addMethods(['execute'])
                        ->getMock();

        $stmtMock->method('execute')
                ->willReturn(true);

        // mock PDO
        $pdoMock = $this->getMockBuilder(stdClass::class)
                        ->addMethods(['prepare'])
                        ->getMock();

        $pdoMock->method('prepare')
                ->willReturn($stmtMock);

        // service
        $service = new BookingService($pdoMock);

        // test
        $result = $service->validatePayment(1);

        // assertion
        $this->assertTrue($result);
    }
}