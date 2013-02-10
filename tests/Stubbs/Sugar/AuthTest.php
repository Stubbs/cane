<?php

/**
 * Unit tests for the SugarAPI class.
 */

namespace Stubbs\Sugar\SugarAPI\Tests;

use Stubbs\Sugar\Auth,
    Stubbs\Sugar\Transport,
    Stubbs\Sugar\SugarException;;

class AuthTest extends \PHPUnit_Framework_TestCase
{
    protected function getValidLogin()
    {
        return json_decode("{id: 111222333}");
    }

    /**
     * @covers Auth::login
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage You must supply a username, password & URL to login.
     */
    public function testNullPasswordThrowsException() {
        $objAuth = new Auth();

        $objAuth->login('test_username', null, 'http://www.example.com');
    }

    /**
     * @covers Auth::login
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage You must supply a username, password & URL to login.
     */
    public function testNullURLThrowsException() {
        $objAuth = new Auth();

        $objAuth->login('test_username', 'test_password', null);
    }

    /**
     * @covers Auth::login
     * @expectedException UnexpectedValueException
     * @expectedExceptionMessage You must supply a username, password & URL to login.
     */
    public function testNullUsernameThrowsException() {
        $objAuth = new Auth();

        $objAuth->login(null, 'test_password', 'http://www.example.com');
    }
    
    /**
     * @covers Auth::login
     */
    public function testLoginSuccess() {
        $objMockTransport = $this->getMock('Transport', array('call'));

        $objMockTransport->expects($this->once())
            ->method('call')
            ->with($this->equalTo('login'), $this->anything())
            ->will($this->returnValue(
                json_decode('{"id": "11223344"}')
            ));

        $objAuth = new Auth();

        $objAuth->login('test_user', 'test_password', $objMockTransport);

        $this->assertEquals($objAuth->getSessionID(), '11223344');
    }
    
    /**
     * @covers Auth::login
     * @expectedException Exception
     * @expectedExceptionMessage Invalid username/password.
     */
    public function testBadUsernameOrPasswordThrowsException() {
        $objMockTransport = $this->getMock('Transport', array('call'));

        $objMockTransport->expects($this->once())
            ->method('call')
            ->will($this->throwException(new Transport\Exception('Invalid username/password.', 10)));

        $objAuth = new Auth();

        $objAuth->login('test_user', 'test_password', $objMockTransport);

        $this->assertNull($objAuth->getSessionID());
    }
    

}