<?php

/**
 * Unit tests for the Transport class.
 */

namespace Stubbs\Sugar\SugarAPI\Tests;

use Stubbs\Sugar\Transport;

class TransportTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Stubbs\Sugar\Transport::__construct
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage You must supply a URL to call.
     */
    public function testNullURLThrowsException() {
        $objTransport = new Transport(null, null);
    }

    /**
     * @covers Stubbs\Sugar\Transport::__construct
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage You must supply a valid Auth token.
     */
    public function testNullAuthTokenThrowsException() {
        $objTransport = new Transport('http://www.example.com', null);
    }
    
}